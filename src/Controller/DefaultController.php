<?php


namespace App\Controller;

use App\Repository\InfosRepository;
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
    public function index(InfosRepository $infosRepository): Response
    {

        return $this->render('index.html.twig', [
            'moi' => $infosRepository->findOneBy([
                'name'=>'Lucas Marguiron'
            ])
        ]);
    }
}
