<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\BlogPostRepository;
use App\Repository\CommentRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class BlogPostController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     * @param BlogPostRepository $blogPostRepository
     * @param CommentRepository $commentRepository
     * @return Response
     */
    public function index(BlogPostRepository $blogPostRepository)
    {
        $posts = $blogPostRepository->findAll();



        return $this->render('blog/index.html.twig', [
            'posts' => $posts
        ]);

    }

    /**
     * @Route("/blog/{id}", name="blog_post")
     * @param BlogPostRepository $blogPostRepository
     * @param $id
     * @param MailerInterface $mailer
     * @param Request $request
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function blogPost(BlogPostRepository $blogPostRepository, $id, MailerInterface $mailer, Request $request, CommentRepository $commentRepository)
    {
        $post = $blogPostRepository->find($id);
        $comments = $commentRepository->findByPost($post);

        $comment = new Comment();
        $comment->setIsApproved(false);
        $comment->setPost($post);
        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();


            $this->addFlash('danger', 'Thank you to post a comment, but your comment must be approved');

            $email = (new TemplatedEmail())
                ->from('laurent.develop38@gmail.com')
                ->to($comment->getEmail())
                ->subject('test')
                ->htmlTemplate('email/comment.html.twig')
                ->context([
                    'comment', $comment
                ]);

            $mailer->send($email);


        }

        return $this->render('blog_post/index.html.twig', [
            'comment_form' => $form->createView(),
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
