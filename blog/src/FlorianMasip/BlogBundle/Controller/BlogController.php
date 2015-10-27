<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function blogAction($id)
    {
        return $this->render('BlogBundle:Blog:blog.html.twig', array('id' => $id));
    }

    public function registerAction()
    {
        return $this->render('BlogBundle:Blog:register.html.twig');
    }

    public function postAction($id)
    {
        return $this->render('BlogBundle:Blog:post.html.twig', array('id' => $id));
    }

}
