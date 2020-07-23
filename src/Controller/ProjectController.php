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
     * @Route("/projet/{id}", name="show")
     * @param ProjectRepository $projectRepository
     * @param Project $projects
     * @return Response
     */
    public function index(ProjectRepository $projectRepository, Project $project): Response
    {
        return $this->render('Projects/show.html.twig', [
            'moi' => $this->user,
            'project' => $project
        ]);
    }
}
