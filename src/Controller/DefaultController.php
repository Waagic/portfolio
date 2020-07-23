<?php


namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactType;
use App\Repository\ProjectsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
     * @param ProjectsRepository $projectsRepository
     * @return Response
     */
    public function index(UserRepository $userRepository, Request $request, ProjectsRepository $projectsRepository): Response
    {
        $contact = new Contacts();
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
            'projects' => $projectsRepository->findBy(
                array(),
                array('id' => 'desc'),
                3,
                0
            ),
            'form' => $form->createView(),
        ]);
    }
}
