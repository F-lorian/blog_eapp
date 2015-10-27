<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CrudController extends Controller
{
   	public function newAction()
    {
        return $this->render('BlogBundle:Crud:edit.html.twig');
    }

    public function editAction($id)
    {
        return $this->render('BlogBundle:Crud:edit.html.twig', array('id' => $id));
    }

    public function deleteAction($id)
    {
        
    }
}
