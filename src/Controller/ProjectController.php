<?php


namespace App\Controller;

use App\Entity\Project;
use App\Entity\User;
use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route(name="project_")
 */
class ProjectController extends AbstractController
{
    private $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository->findOneBy(['name'=>'Lucas Marguiron']);
    }

    /**
     * @Route("/projets/{slug}", name="show")
     * @param ProjectRepository $projectRepository
     * @param Project $project
     * @return Response
     */
    public function show(ProjectRepository $projectRepository, Project $project): Response
    {
        return $this->render('Projects/show.html.twig', [
            'moi' => $this->user,
            'project' => $project
        ]);
    }

    /**
     * @Route("/projets", name="index")
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('Projects/index.html.twig', [
            'moi' => $this->user,
            'projects' => $projectRepository->findBy(
                [],
                ['id' => 'desc']
            )
        ]);
    }
}
