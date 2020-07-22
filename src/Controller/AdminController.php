<?php


namespace App\Controller;

use App\Entity\Infos;
use App\Form\InfosType;
use App\Repository\InfosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route(name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="index")
     */
    public function index(InfosRepository $infosRepository): Response
    {

        return $this->render('Admin/index.html.twig', [
            'moi' => $infosRepository->findOneBy([
                'name'=>'Lucas Marguiron'
            ])
        ]);
    }

    /**
     * @Route("admin/{id}/edit", name="infos_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Infos $info
     * @return Response
     */
    public function edit(Request $request, Infos $info): Response
    {
        $form = $this->createForm(InfosType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pictureFile = $form->get('profile_picture')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the file must be processed only when a file is uploaded
            if ($pictureFile) {
                $originalFilename = pathinfo($pictureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$pictureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $pictureFile->move(
                        $this->getParameter('pictures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $info->setProfilePicture($newFilename);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('Admin/Infos/edit.html.twig', [
            'info' => $info,
            'form' => $form->createView(),
        ]);
    }
}
