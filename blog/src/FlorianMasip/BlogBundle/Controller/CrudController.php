<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CrudController extends Controller
{
   	public function newAction($id_blog)
    {
        return $this->render('BlogBundle:Crud:edit.html.twig', array('id_blog' => $id_blog));
    }

    public function editAction($id_blog, $id_post)
    {
        return $this->render('BlogBundle:Crud:edit.html.twig', array('id_blog' => $id_blog, 'id_post' => $id_post));
    }

    public function deleteAction($id_blog, $id_post)
    {
        
    }
}
