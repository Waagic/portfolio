<?php


namespace App\Controller;

use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route(name="app_")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(UserRepository $userRepository): Response
    {

        return $this->render('index.html.twig', [
            'moi' => $userRepository->findOneBy([
                'name'=>'Lucas Marguiron'
            ])
        ]);
    }
}
