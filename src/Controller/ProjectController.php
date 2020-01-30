<?php

namespace App\Controller;

use App\Repository\HumanProjectRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project")
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function index(ProjectRepository $projectRepository, HumanProjectRepository $humanProjectRepository)
    {
        $projects = $projectRepository->findAll();
        $humanProjects = $humanProjectRepository->findAll();

        return $this->render('project/index.html.twig', [
            'projects' => $projects,
            'humanProjects' => $humanProjects
        ]);
    }

    /**
     * @Route("/project/{id}", name="project_post")
     * @param ProjectRepository $projectRepository
     * @param $id
     * @return Response
     */
    public function project(ProjectRepository $projectRepository, $id)
    {
        $project = $projectRepository->find($id);
        return $this->render('project/project.html.twig',[
            'project' => $project
        ]);
    }
}
