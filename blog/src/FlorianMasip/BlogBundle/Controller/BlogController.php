<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function blogAction($id_blog)
    {
        return $this->render('BlogBundle:Blog:blog.html.twig', array('id_blog' => $id_blog));
    }

    public function registerAction()
    {
        return $this->render('BlogBundle:Blog:register.html.twig');
    }

    public function editAction($id_blog)
    {
        return $this->render('BlogBundle:Blog:register.html.twig', array('id_blog' => $id_blog));
    }

    public function postAction($id_blog, $id_post)
    {
        return $this->render('BlogBundle:Blog:post.html.twig', array('id_blog' => $id_blog, 'id_post' => $id_post));
    }

}
