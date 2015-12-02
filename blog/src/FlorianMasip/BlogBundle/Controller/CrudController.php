<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FlorianMasip\BlogBundle\Entity\Post;
use FlorianMasip\BlogBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;

class CrudController extends Controller
{
   	public function newAction(Request $request, $url_blog)
    {

      foreach ($this->getUser()->getBlogs() as $b){
        if($b->getUrlAlias() == $url_blog){

          $post = new Post();

          $em = $this->getDoctrine()->getManager();
          $form = $this->createForm(new PostType(array('blog' => $b)), $post);

          $form->handleRequest($request);

          if ($request->isMethod('POST')) {

              $em = $this->getDoctrine()->getManager();
              $postRepository = $em->getRepository('BlogBundle:Post');
              $categoryRepository = $em->getRepository('BlogBundle:Category');

              // Récupère l'url alias entrée pour teste (existance et regex)
              $category = $form["category"]->getData();
              $url_alias = $form["urlAlias"]->getData();
              $name = $form["name"]->getData();
              $content = $form["content"]->getData();

              $error = false;

              // Teste si l'url contient autre chose que des chiffres des lettres ou des tirets
              if (!preg_match("/^[a-z-A-Z-0-9]+$/", $url_alias)) {
                  $form["urlAlias"]->addError(new FormError("L'url ne peut contenir que des chiffres, des lettres ou des tirets"));
                  $error = true;
              }else{
                  $test_url = $postRepository->findOneByUrlAlias($url_alias);
                  // Teste si l'url_alias existe déjà en base
                  if (!empty($test_url)) {
                      $form["urlAlias"]->addError(new FormError("L'url : '$url_alias' est déjà utilisée"));
                      $error = true;
                  }
              }

              // Si le formulaire est valide
              if ($form->isValid() && !$error) {

                  $blogRepository = $em->getRepository('BlogBundle:Blog');
                  //$blog = $blogRepository->findOneByUrlAlias($url_blog);
                  //$post->setBlog($blog);
                  $post->setBlog($b);
                  $post->setName($name);
                  $post->setUrlAlias($url_alias);
                  $post->setContent($content);
                  // Transforme l'objet "NomCategory" (id,nom) en string (nom) avant l'insertion en BDD
                  if (!empty($category)){
                      $post->setCategory($category);
                  } else {
                      $category = $categoryRepository->findOneByNom("general");
                      $post->setCategory($category);
                  }

                  // Set la date de creation
                  $post->setDateCreation(new \DateTime());

                  $em->persist($post);
                  $em->flush();

                  // Message de confirmation pour l'utilisateur
                  $request->getSession()->getFlashBag()->add('notice', "Le post a été créé avec succès");

                  return $this->redirect($this->generateUrl('blog_view_post', array('url_blog' => $url_blog, 'category_name' => $category->getNom(), 'url_post' => $url_alias)));
              } else {

                  // Message de confirmation pour l'utilisateur
                  $request->getSession()->getFlashBag()->add('error', "Erreur lors de la création");

              }
          }

          return $this->render('BlogBundle:Crud:edit.html.twig', array('url_blog' => $url_blog, 'form' => $form->createView()));
        }
      }

      throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }

    public function editAction(Request $request, $url_blog, $url_post)
    {

        foreach ($this->getUser()->getBlogs() as $b){
          if($b->getUrlAlias() == $url_blog){

            $em = $this->getDoctrine()->getManager();
            $postRepository = $em->getRepository('BlogBundle:Post');
            $categoryRepository = $em->getRepository('BlogBundle:Category');
            $post = $postRepository->findOneByUrlAlias($url_post);
            $form = $this->createForm(new PostType(array('blog' => $b)), $post);

            if ($request->isMethod('POST')) {
                $form = $this->createForm(new PostType(array('blog' => $b)));
                $form->handleRequest($request);

                // Récupère l'url alias entrée pour teste (existance et regex)
                $category = $form["category"]->getData();
                $url_alias = $form["urlAlias"]->getData();
                $name = $form["name"]->getData();
                $content = $form["content"]->getData();

                $error = false;

                // Teste si l'url contient autre chose que des chiffres des lettres ou des tirets
                if (!preg_match("/^[a-z-A-Z-0-9]+$/", $url_alias)) {
                    $form["urlAlias"]->addError(new FormError("L'url ne peut contenir que des chiffres, des lettres ou des tirets"));
                    $error = true;
                }else{
                    $test_url = $postRepository->findOneByUrlAlias($url_alias);
                    // Teste si l'url_alias existe déjà en base
                    if (!empty($test_url)) {
                        $form["urlAlias"]->addError(new FormError("L'url : '$url_alias' est déjà utilisée"));
                        $error = true;
                    }
                }

                // Si le formulaire est valide
                if ($form->isValid() && !$error) {

                    $post->setName($name);
                    $post->setUrlAlias($url_alias);
                    $post->setContent($content);
                    // Transforme l'objet "NomCategory" (id,nom) en string (nom) avant l'insertion en BDD
                    if (!empty($category)){
                        $post->setCategory($category);
                    } else {
                        $category = $categoryRepository->findOneByNom("general");
                        $post->setCategory($category);
                    }

                    //$em->persist($post);
                    $em->flush();

                    // Message de confirmation pour l'utilisateur
                    $request->getSession()->getFlashBag()->add('notice', "Le post a été modifié avec succès");

                    return $this->redirect($this->generateUrl('blog_view_post', array('url_blog' => $url_blog, 'category_name' => $category->getNom(), 'url_post' => $url_alias)));
                } else {

                    // Message de confirmation pour l'utilisateur
                    $request->getSession()->getFlashBag()->add('error', "Erreur lors de la modification");

                }
            }

            return $this->render('BlogBundle:Crud:edit.html.twig', array('url_blog' => $url_blog, 'url_post' => $url_post, 'form' => $form->createView()));
          }
        }

        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }

    public function deleteAction(Request $request, $url_blog, $url_post)
    {

      foreach ($this->getUser()->getBlogs() as $b){
        if($b->getUrlAlias() == $url_blog){

          $em = $this->getDoctrine()->getManager();
          /*$postRepository = $em->getRepository('BlogBundle:Post');
          $post = $postRepository->findOneByUrlAlias($url_post);*/
          $post = $b->getPostByUrlAlias($url_post);

          if(!empty($post)){
              $em->remove($post);
              $em->flush();
              $request->getSession()->getFlashBag()->add('notice', 'Post supprimé');
              return $this->redirect($this->generateUrl('blog_view_by_category', array('category_name' => $post->getCategory()->getNom(), 'url_blog' => $url_blog)));
          }
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();

        }
      }

      throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }
}
