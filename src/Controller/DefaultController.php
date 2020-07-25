<?php


namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route(name="app_")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param UserRepository $userRepository
     * @param Request $request
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function index(UserRepository $userRepository, Request $request, ProjectRepository $projectRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime('NOW');
            $contact->setDate($date);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('index.html.twig', [
            'moi' => $userRepository->findOneBy([
                'name'=>'Lucas Marguiron'
            ]),
            'projects' => $projectRepository->findBy(
                array(),
                array('id' => 'asc'),
                3,
                0
            ),
            'form' => $form->createView(),
        ]);
    }
}
