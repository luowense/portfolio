<?php

namespace App\Controller;

use App\Repository\BlogPostRepository;
use App\Repository\DiplomaRepository;
use App\Repository\ExperienceRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @param ProjectRepository $projectRepository
     * @param BlogPostRepository $blogPostRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ProjectRepository $projectRepository, BlogPostRepository $blogPostRepository)
    {
        $projects = $projectRepository->findAll();
        $posts = $blogPostRepository->findAll();


        return $this->render('homepage/home.html.twig', [
            'projects' => $projects,
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/about-me", name="about_me")
     * @param UserRepository $userRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutMe(UserRepository $userRepository, ExperienceRepository $experienceRepository, DiplomaRepository $diplomaRepository, SkillRepository $skillRepository)
    {
        $user = $userRepository->findAll();
        $experiences = $experienceRepository->findAll();
        $diplomas = $diplomaRepository->findAll();
        $skills = $skillRepository->findAll();

        return $this->render('user/index.html.twig', [
           'user' => $user,
            'experiences' => $experiences,
            'diplomas' => $diplomas,
            'skills' => $skills
        ]);
    }


}
