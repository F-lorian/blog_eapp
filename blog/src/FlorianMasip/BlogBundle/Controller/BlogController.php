<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Blog:index.html.twig');
    }

    public function postAction($id)
    {
        return $this->render('BlogBundle:Blog:post.html.twig', array('id' => $id));
    }
}
