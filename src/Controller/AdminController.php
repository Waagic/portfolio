<?php


namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Language;
use App\Entity\Project;
use App\Entity\User;
use App\Form\EditEmailType;
use App\Form\EditPasswordType;
use App\Form\LanguageType;
use App\Form\ProjectType;
use App\Form\UserType;
use App\Repository\ContactRepository;
use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use App\Service\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route(name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="index")
     * @param UserRepository $userRepository
     * @param ContactRepository $contactRepository
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function index(UserRepository $userRepository, ContactRepository $contactRepository, ProjectRepository $projectRepository): Response
    {

        return $this->render('Admin/index.html.twig', [
            'moi' => $userRepository->findOneBy([
                'name' => 'Lucas Marguiron'
            ]),
            'contacts' => $contactRepository->findAll(),
            'projects' => $projectRepository->findAll()
        ]);
    }

    /**
     * @Route("admin/{id}/edit", name="infos_edit", methods={"GET","POST"})
     * @param Request $request
     * @param User $user
     * @param FileUploader $fileUploader
     * @return Response
     */
    public function edit(Request $request, User $user, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pictureFile = $form->get('profile_picture')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the file must be processed only when a file is uploaded
            if ($pictureFile) {
                $pictureFileName = $fileUploader->upload($pictureFile, $this->getParameter('pictures_directory'));
                $user->setProfilePicture($pictureFileName);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('Admin/Infos/edit.html.twig', [
            'info' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("admin/{id}/edit-email", name="email_edit", methods={"GET","POST"})
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function editEmail(Request $request, User $user): Response
    {
        $form = $this->createForm(EditEmailType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('Admin/Email/editMail.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("admin/{id}/edit-password", name="password_edit", methods={"GET","POST"})
     * @param Request $request
     * @param User $user
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function editPassword(Request $request, User $user, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(EditPasswordType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('Admin/Password/editPassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/contact/{id}/delete", name="delete_contact", methods={"DELETE"})
     * @param Request $request
     * @param Contact $contact
     * @return Response
     */
    public function deleteContact(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/admin/projet/new", name="new_projet")
     * @param Request $request
     * @param FileUploader $fileUploader
     * @return Response
     */
    public function newProject(Request $request, FileUploader $fileUploader, Slugify $slugify): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $slug = $slugify->generate($project->getTitle());
            $project->setSlug($slug);

            $logo = $form->get('logo')->getData();
            if ($logo) {
                $pictureFileName = $fileUploader->upload($logo, $this->getParameter('logos_directory'));
                $project->setLogo($pictureFileName);
            }

            $cover = $form->get('cover')->getData();
            if ($cover) {
                $pictureFileName = $fileUploader->upload($cover, $this->getParameter('covers_directory'));
                $project->setCover($pictureFileName);
            }

            $screenshots = $form->get('screenshot')->all();
            if ($screenshots) {
                foreach ($screenshots as $screenshot) {
                    $pictureFileName = $fileUploader->upload($screenshot->get('fileUpload')->getData(), $this->getParameter('screenshots_directory'));
                    $screenshot->getData()->setFile($pictureFileName);
                }
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute("admin_index");
        }

        return $this->render('Admin/Project/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/projet/{id}/edit", name="edit_projet")
     * @param Request $request
     * @param FileUploader $fileUploader
     * @param Project $project
     * @return Response
     */
    public function editProject(Request $request, FileUploader $fileUploader, Project $project, Slugify $slugify): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $slug = $slugify->generate($project->getTitle());
            $project->setSlug($slug);

            $logo = $form->get('logo')->getData();
            if ($logo) {
                $pictureFileName = $fileUploader->upload($logo, $this->getParameter('logos_directory'));
                $project->setLogo($pictureFileName);
            }

            $cover = $form->get('cover')->getData();
            if ($cover) {
                $pictureFileName = $fileUploader->upload($cover, $this->getParameter('covers_directory'));
                $project->setCover($pictureFileName);
            }

            $screenshots = $form->get('screenshot')->all();
            foreach ($screenshots as $screenshot) {
                $fileUpload = $screenshot->get('fileUpload')->getData();
                if ($fileUpload) {
                    $pictureFileName = $fileUploader->upload($fileUpload, $this->getParameter('screenshots_directory'));
                    $screenshot->getData()->setFile($pictureFileName);
                }
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('Admin/Project/edit.html.twig', [
            'project' => $project,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/projet/{id}/delete", name="delete_project", methods={"DELETE"})
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function deleteProject(Request $request, Project $project): Response
    {
        if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($project);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/admin/langage/new", name="new_langage")
     * @param Request $request
     * @return Response
     */
    public function newLanguage(Request $request): Response
    {
        $langage = new Language();
        $form = $this->createForm(LanguageType::class, $langage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($langage);
            $entityManager->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('Admin/Langages/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
