<?php

namespace App\Controller;

use App\Repository\BlogPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     * @param BlogPostRepository $blogPostRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(BlogPostRepository $blogPostRepository)
    {
        $posts = $blogPostRepository->findAll();

        return $this->render('blog/index.html.twig', [
            'posts' => $posts
        ]);

    }

//    /**
//     * @Route("/blog/post/{id}" name="blog_post")
//     * @param BlogPostRepository $blogPostRepository
//     * @param $id
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function post(BlogPostRepository $blogPostRepository, $id)
//    {
//        $post = $blogPostRepository->find($id);
//
//        return $this->render('blog_post/index.html.twig', [
//           'post' => $post
//        ]);
//    }
}
