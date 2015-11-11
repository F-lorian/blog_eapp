<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FlorianMasip\BlogBundle\Entity\Blog;
use FlorianMasip\BlogBundle\Entity\User;
use FlorianMasip\BlogBundle\Form\BlogType;
use FlorianMasip\BlogBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;

class BlogController extends Controller
{
    public function indexAction()
    {   
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function blogAction($url_blog)
    {
        $em = $this->getDoctrine()->getManager();
        $blogRepository = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepository->findOneByUrlAlias($url_blog);

        return $this->render('BlogBundle:Blog:blog.html.twig', array('blog' => $blog));
    }

    public function registerAction(Request $request)
    {
        
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);
            
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $userRepository = $em->getRepository('BlogBundle:User');

            $pseudo = $form["pseudo"]->getData();
            $mail = $form["mail"]->getData();
            $surname = $form["surname"]->getData();
            $lastname = $form["lastname"]->getData();
            $age = $form["age"]->getData();
            $password = $form["password"]->getData();

            $error = false;

            $test_pseudo = $userRepository->getUserByPseudo($pseudo);
            $test_mail = $userRepository->getUserByMail($mail);
            // Teste si le pseudo existe déjà en base
            if (!empty($test_pseudo) && $test_pseudo[0]['mail'] != $request->getSession()->get('mail')) {
                $form["pseudo"]->addError(new FormError("Le pseudo : '$pseudo' est déjà utilisé"));
                $error = true;
            }
            // Teste si le mail existe déjà en base
            if (!empty($test_mail) && $test_mail[0]['pseudo'] != $request->getSession()->get('pseudo')) {
                $form["mail"]->addError(new FormError("Le mail: '$mail' est déjà utilisé"));
                $error = true;
            }


            if ($form->isValid() && !$error) {
                $user->setPseudo($pseudo);
                $user->setMail($mail);
                $user->setSurname($surname);
                $user->setLastname($lastname);
                $user->setAge($age);
                $user->setPassword($password);
                $em->persist($user);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Inscription réussie');
                return $this->redirect($this->generateUrl('blog_homepage'));

            } else {
                $request->getSession()->getFlashBag()->add('notice', "Erreur lors de l'inscription");
            }
        }
        //$request->getSession()->getFlashBag()->add('notice', 'test de notice');
        return $this->render('BlogBundle:Blog:register.html.twig', array("form" => $form->createView()));
    }

    public function loginAction(Request $request)
    {


    }

    public function newAction(Request $request)
    {
        
        $blog = new Blog();
        $form = $this->createForm(new BlogType(), $blog);
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {

            $em = $this->getDoctrine()->getManager();
            $blogRepository = $em->getRepository('BlogBundle:Blog');

            $name = $form["name"]->getData();
            $url_alias = $form["urlAlias"]->getData();
            $theme = $form["theme"]->getData();
            $description = $form["description"]->getData();

            $error = false;

            $test_name = $blogRepository->getBlogByName($name);
            // Teste si le nom existe déjà en base
            if (!empty($test_name)) {
                $form["name"]->addError(new FormError("Le nom : '$name' est déjà utilisé"));
                $error = true;
            }

            // Teste si l'url contient autre chose que des chiffres des lettres ou des tirets
            if (!preg_match("/^[a-z-A-Z-0-9]+$/", $url_alias)) {
                $form["urlAlias"]->addError(new FormError("L'url ne peut contenir que des chiffres, des lettres ou des tirets"));
                $error = true;
            }else{
                $test_url = $blogRepository->getBlogByUrl($url_alias);
                // Teste si l'url_alias existe déjà en base
                if (!empty($test_url)) {
                    $form["urlAlias"]->addError(new FormError("L'url : '$url_alias' est déjà utilisée"));
                    $error = true;
                }
            }

            if ($form->isValid() && !$error) {
                $blog->setUser($this->getUser());
                $blog->setName($name);
                $blog->setUrlAlias($url_alias);
                $blog->setTheme($theme);
                $blog->setDescription($description);
                $em->persist($blog);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Blog crée');
                return $this->redirect($this->generateUrl('blog_view', array('url_blog' => $blog->getUrlAlias())));

            } else {
                $request->getSession()->getFlashBag()->add('notice', "Erreur lors de la création");
            }
        }

        return $this->render('BlogBundle:Blog:new.html.twig', array("form" => $form->createView()));
    }

    public function editAction(Request $request, $url_blog)
    {

        $em = $this->getDoctrine()->getManager();
        $blogRepository = $em->getRepository('BlogBundle:Blog');
        $blog = $blogRepository->findOneByUrlAlias($url_blog);

        $form = $this->createForm(new BlogType(), $blog);
        

        if ($request->isMethod('POST')) {
            $form = $this->createForm(new BlogType());
            $form->handleRequest($request);

            $name = $form["name"]->getData();
            $url_alias = $form["urlAlias"]->getData();
            $theme = $form["theme"]->getData();
            $description = $form["description"]->getData();

            $error = false;

            $test_name = $blogRepository->getBlogByName($name);
            // Teste si le nom existe déjà en base
            if (!empty($test_name)) {
                $form["name"]->addError(new FormError("Le nom : '$name' est déjà utilisé"));
                $error = true;
            }

            // Teste si l'url contient autre chose que des chiffres des lettres ou des tirets
            if (!preg_match("/^[a-z-A-Z-0-9]+$/", $url_alias)) {
                $form["urlAlias"]->addError(new FormError("L'url ne peut contenir que des chiffres, des lettres ou des tirets"));
                $error = true;
            }else{
                $test_url = $blogRepository->getBlogByUrl($url_alias);
                // Teste si l'url_alias existe déjà en base
                if (!empty($test_url)) {
                    $form["urlAlias"]->addError(new FormError("L'url : '$url_alias' est déjà utilisée"));
                    $error = true;
                }
            }

            if ($form->isValid() && !$error) {
                $blog->setName($name);
                $blog->setUrlAlias($url_alias);
                $blog->setTheme($theme);
                $blog->setDescription($description);
                //$em->persist($blog);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Blog modifié');
                return $this->redirect($this->generateUrl('blog_view', array('url_blog' => $blog->getUrlAlias())));

            } else {
                $request->getSession()->getFlashBag()->add('notice', "Erreur lors de la modification");
            }
        }

        return $this->render('BlogBundle:Blog:new.html.twig', array('url_blog' => $url_blog, "form" => $form->createView()));
    }

    public function postAction($url_blog, $url_post)
    {

        $em = $this->getDoctrine()->getManager();
        $blogRepository = $em->getRepository('BlogBundle:Post');
        $post = $blogRepository->findOneByUrlAlias($url_post);

        return $this->render('BlogBundle:Blog:post.html.twig', array('url_blog' => $url_blog, 'post' => $post));
    }

}
