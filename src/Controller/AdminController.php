<?php


namespace App\Controller;

use App\Entity\Contacts;
use App\Entity\Projects;
use App\Entity\User;
use App\Form\EditEmailType;
use App\Form\EditPasswordType;
use App\Form\ProjectType;
use App\Form\UserType;
use App\Repository\ContactsRepository;
use App\Repository\ProjectsRepository;
use App\Repository\UserRepository;
use App\Service\FileUploader;
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
     * @param ContactsRepository $contactsRepository
     * @return Response
     */
    public function index(UserRepository $userRepository, ContactsRepository $contactsRepository, ProjectsRepository $projectsRepository): Response
    {

        return $this->render('Admin/index.html.twig', [
            'moi' => $userRepository->findOneBy([
                'name' => 'Lucas Marguiron'
            ]),
            'contacts' => $contactsRepository->findAll(),
            'projects' => $projectsRepository->findAll()
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
     * @param Contacts $contacts
     * @return Response
     */
    public function deleteContact(Request $request, Contacts $contacts): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contacts->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contacts);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/admin/projet/new", name="new_projet")
     * @param Request $request
     * @return Response
     */
    public function newProject(Request $request, FileUploader $fileUploader): Response
    {
        $project = new Projects();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

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

            $screenshots = $form->get('screenshots')->all();
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
     * @param Projects $projects
     * @return Response
     */
    public function editProject(Request $request, FileUploader $fileUploader, Projects $projects): Response
    {
        $form = $this->createForm(ProjectType::class, $projects);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $logo = $form->get('logo')->getData();
            if ($logo) {
                $pictureFileName = $fileUploader->upload($logo, $this->getParameter('logos_directory'));
                $projects->setLogo($pictureFileName);
            }

            $cover = $form->get('cover')->getData();
            if ($cover) {
                $pictureFileName = $fileUploader->upload($cover, $this->getParameter('covers_directory'));
                $projects->setCover($pictureFileName);
            }

            $screenshots = $form->get('screenshots')->all();
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
            'project' => $projects,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/projet/{id}/delete", name="delete_project", methods={"DELETE"})
     * @param Request $request
     * @param Projects $project
     * @return Response
     */
    public function deleteProject(Request $request, Projects $project): Response
    {
        if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($project);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index');
    }
}
