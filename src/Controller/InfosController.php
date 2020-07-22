<?php

namespace App\Controller;

use App\Entity\Infos;
use App\Form\InfosType;
use App\Repository\InfosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/infos")
 */
class InfosController extends AbstractController
{
    private $moi;

    public function __construct(InfosRepository $infosRepository)
    {
        $this->moi = $infosRepository->findOneBy([
            'name' => 'Lucas Marguiron'
        ]);
    }

    /**
     * @Route("/", name="infos_index", methods={"GET"})
     * @param InfosRepository $infosRepository
     * @return Response
     */
    public function index(InfosRepository $infosRepository): Response
    {
        return $this->render('infos/index.html.twig', [
            'infos' => $infosRepository->findAll(),
            'moi' => $this->moi
        ]);
    }

    /**
     * @Route("/new", name="infos_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $info = new Infos();
        $form = $this->createForm(InfosType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($info);
            $entityManager->flush();

            return $this->redirectToRoute('infos_index');
        }

        return $this->render('infos/new.html.twig', [
            'info' => $info,
            'form' => $form->createView(),
            'moi' => $this->moi
        ]);
    }

    /**
     * @Route("/{id}", name="infos_show", methods={"GET"})
     */
    public function show(Infos $info): Response
    {
        return $this->render('infos/show.html.twig', [
            'info' => $info,
            'moi' => $this->moi
        ]);
    }

    /**
     * @Route("/{id}/edit", name="infos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Infos $info): Response
    {
        $form = $this->createForm(InfosType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('infos_index');
        }

        return $this->render('infos/edit.html.twig', [
            'info' => $info,
            'form' => $form->createView(),
            'moi' => $this->moi
        ]);
    }

    /**
     * @Route("/{id}", name="infos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Infos $info): Response
    {
        if ($this->isCsrfTokenValid('delete' . $info->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($info);
            $entityManager->flush();
        }

        return $this->redirectToRoute('infos_index');
    }
}
