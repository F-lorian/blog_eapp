<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FlorianMasip\BlogBundle\Entity\Blog;
use FlorianMasip\BlogBundle\Entity\User;
use FlorianMasip\BlogBundle\Entity\Category;
use FlorianMasip\BlogBundle\Form\BlogType;
use FlorianMasip\BlogBundle\Form\UserType;
use FlorianMasip\BlogBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function blogAction($url_blog, $category_name = null, $page = 1)
    {
        $em = $this->getDoctrine()->getManager();

        $blogRepository = $em->getRepository('BlogBundle:Blog');
        $categoryRepository = $em->getRepository('BlogBundle:Category');
        $postRepository = $em->getRepository('BlogBundle:Post');

        $blog = $blogRepository->findOneByUrlAlias($url_blog);

        if(!empty($blog)){

            $defaultCategory = $categoryRepository->findOneByBlog(null);
            $category = null;
            $postsPerPage = 5;

            $paginationRoute = "blog_view";
            $paginationRouteParam = array('url_blog' => $blog->getUrlAlias());

            if($category_name and $category_name != $defaultCategory->getNom()){

                $category = $blog->hasCategory($category_name);
                if(empty($category)){
                    throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ();
                }

                $paginationRoute = "blog_view_by_category";
                $paginationRouteParam = array('url_blog' => $blog->getUrlAlias(), 'category_name' => $category_name);

            }

            //$posts = $blog->getPostsByCategory($category, $page-1, $postsPerPage);
            $posts = $postRepository->getPostsList($blog, $page-1, $postsPerPage, $category);
            $nb_post = count($posts);

            //Paramètre du pagination
            $pagination = array(
                'page' => $page,
                'route' => $paginationRoute,
                'route_index' => "blog_view",
                'pages_count' => ceil($nb_post / $postsPerPage),
                'route_params' => $paginationRouteParam
            );

            return $this->render('BlogBundle:Blog:blog.html.twig', array('blog' => $blog, 'posts' => $posts, 'pagination' => $pagination, 'defaultCategory' => $defaultCategory, 'category' => $category));

        }
        //à remplacer par un 404
        throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ();
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

            $test_name = $blogRepository->findOneByName($name);
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
                $test_url = $blogRepository->findOneByUrlAlias($url_alias);
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

                $request->getSession()->getFlashBag()->add('notice', 'Blog créé');
                return $this->redirect($this->generateUrl('blog_view', array('url_blog' => $blog->getUrlAlias())));

            } else {
                $request->getSession()->getFlashBag()->add('error', "Erreur lors de la création");
            }
        }

        return $this->render('BlogBundle:Blog:new.html.twig', array("form" => $form->createView()));
    }

    public function editAction(Request $request, $url_blog)
    {

      foreach ($this->getUser()->getBlogs() as $b){
        if($b->getUrlAlias() == $url_blog){

            $em = $this->getDoctrine()->getManager();
            $blogRepository = $em->getRepository('BlogBundle:Blog');

            $form = $this->createForm(new BlogType(), $b);


            if ($request->isMethod('POST')) {
                $form = $this->createForm(new BlogType());
                $form->handleRequest($request);

                $name = $form["name"]->getData();
                $url_alias = $form["urlAlias"]->getData();
                $theme = $form["theme"]->getData();
                $description = $form["description"]->getData();

                $error = false;

                $test_name = $blogRepository->findOneByName($name);
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
                    $test_url = $blogRepository->findOneByUrlAlias($url_alias);
                    // Teste si l'url_alias existe déjà en base
                    if (!empty($test_url)) {
                        $form["urlAlias"]->addError(new FormError("L'url : '$url_alias' est déjà utilisée"));
                        $error = true;
                    }
                }

                if ($form->isValid() && !$error) {
                    $b->setName($name);
                    $b->setUrlAlias($url_alias);
                    $b->setTheme($theme);
                    $b->setDescription($description);
                    //$em->persist($blog);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Blog modifié');
                    return $this->redirect($this->generateUrl('blog_view', array('url_blog' => $url_alias)));

                } else {
                    $request->getSession()->getFlashBag()->add('error', "Erreur lors de la modification");
                }
            }

            return $this->render('BlogBundle:Blog:new.html.twig', array('url_blog' => $url_blog, "form" => $form->createView()));
          }
        }

        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();

    }

    public function postAction($url_blog, $category_name, $url_post)
    {

        $em = $this->getDoctrine()->getManager();
        $blogRepository = $em->getRepository('BlogBundle:Blog');
        $postRepository = $em->getRepository('BlogBundle:Post');
        $categoryRepository = $em->getRepository('BlogBundle:Category');

        $defaultCategory = $categoryRepository->findOneByNom('general');

        $blog = $blogRepository->findOneByUrlAlias($url_blog);

        if($category_name != 'general'){
            $category = $categoryRepository->findOneBy(array('nom' => $category_name, 'blog' => $blog));
        }
        else{
            $category = $defaultCategory;
        }

        if(!empty($category)){
            $post = $postRepository->findOneBy(array('category' => $category, 'urlAlias' => $url_post, 'blog' => $blog));
            if(!empty($post)){
                return $this->render('BlogBundle:Blog:post.html.twig', array('url_blog' => $url_blog, 'post' => $post));
            }
        }

        throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ();
    }

    public function deleteAction(Request $request, $url_blog)
    {
        foreach ($this->getUser()->getBlogs() as $b){
          if($b->getUrlAlias() == $url_blog){
            $em = $this->getDoctrine()->getManager();
            $blogRepository = $em->getRepository('BlogBundle:Blog');

            $em->remove($b);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Blog supprimé');
            return $this->redirect($this->generateUrl('blog_homepage'));
          }
        }

        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }

    public function newCategoryAction(Request $request, $url_blog)
    {

        foreach ($this->getUser()->getBlogs() as $b){
          if($b->getUrlAlias() == $url_blog){

            $em = $this->getDoctrine()->getManager();

            $blogRepository = $em->getRepository('BlogBundle:Blog');

            $categoryRepository = $em->getRepository('BlogBundle:Category');
            $category = new Category();
            $form = $this->createForm(new CategoryType(), $category);

            if ($request->isMethod('POST')) {
                $form = $this->createForm(new CategoryType());
                $form->handleRequest($request);

                // Récupère l'url alias entrée pour teste (existance et regex)
                $nomCategory = $form["nom"]->getData();

                $error = false;

                // Teste si l'url contient autre chose que des chiffres des lettres ou des tirets
                if (!preg_match("/^[a-z-A-Z-0-9]+$/", $nomCategory)) {
                    $form["nom"]->addError(new FormError("Une categorie ne peut contenir que des chiffres, des lettres ou des tirets"));
                    $error = true;
                }else{

                    $test_nom = $categoryRepository->findOneBy(array('nom' => $nomCategory, 'blog' => $b));
                    // Teste si l'url_alias existe déjà en base
                    if (!empty($test_nom)) {
                        $form["nom"]->addError(new FormError("la catégorie '$nomCategory' existe déjà sur ce blog"));
                        $error = true;
                    }
                }

                // Si le formulaire est valide
                if ($form->isValid() && !$error) {

                    $category->setNom($nomCategory);
                    $category->setBlog($b);

                    $em->persist($category);
                    $em->flush();

                    // Message de confirmation pour l'utilisateur
                    $request->getSession()->getFlashBag()->add('notice', "catégorie ajoutée avec succès");

                    return $this->redirect($this->generateUrl('blog_view_by_category', array('url_blog' => $url_blog, 'category_name' => $nomCategory)));
                } else {

                    // Message de confirmation pour l'utilisateur
                    $request->getSession()->getFlashBag()->add('error', "Erreur lors de l'ajout'");

                }
            }

            return $this->render('BlogBundle:Blog:new-category.html.twig', array('url_blog' => $url_blog, 'form' => $form->createView()));
          }
        }

        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }


    public function editCategoryAction(Request $request, $url_blog, $category_name)
    {

        foreach ($this->getUser()->getBlogs() as $b){
          if($b->getUrlAlias() == $url_blog){

            $em = $this->getDoctrine()->getManager();

            $blogRepository = $em->getRepository('BlogBundle:Blog');

            $categoryRepository = $em->getRepository('BlogBundle:Category');
            $category = $categoryRepository->findOneBy(array('nom' => $category_name, 'blog' => $b));

            if(empty($category)){
                throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
            }

            $form = $this->createForm(new CategoryType(), $category);

            if ($request->isMethod('POST')) {
                $form = $this->createForm(new CategoryType());
                $form->handleRequest($request);

                // Récupère l'url alias entrée pour teste (existance et regex)
                $name = $form["nom"]->getData();

                $error = false;

                // Teste si l'url contient autre chose que des chiffres des lettres ou des tirets
                if (!preg_match("/^[a-z-A-Z-0-9]+$/", $name)) {
                    $form["nom"]->addError(new FormError("Une categorie ne peut contenir que des chiffres, des lettres ou des tirets"));
                    $error = true;
                }else{

                    $test_nom = $categoryRepository->findOneBy(array('nom' => $name, 'blog' => $blog));
                    // Teste si l'url_alias existe déjà en base
                    if (!empty($test_nom)) {
                        $form["nom"]->addError(new FormError("la catégorie '$name' existe déjà sur ce blog"));
                        $error = true;
                    }
                }

                // Si le formulaire est valide
                if ($form->isValid() && !$error) {
                    $category->setNom($name);
                    $em->flush();
                    // Message de confirmation pour l'utilisateur
                    $request->getSession()->getFlashBag()->add('notice', "catégorie modifiée");

                    return $this->redirect($this->generateUrl('blog_view_by_category', array('url_blog' => $url_blog, 'category_name' => $name)));
                } else {
                    // Message de confirmation pour l'utilisateur
                    $request->getSession()->getFlashBag()->add('error', "Erreur lors de la modification");
                }
            }
            return $this->render('BlogBundle:Blog:new-category.html.twig', array('url_blog' => $url_blog, 'category_name' => $category_name, 'form' => $form->createView()));
          }
        }

        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }

    public function deleteCategoryAction(Request $request, $url_blog, $category_name)
    {
        foreach ($this->getUser()->getBlogs() as $b){
            if($b->getUrlAlias() == $url_blog){
                $em = $this->getDoctrine()->getManager();
                $blogRepository = $em->getRepository('BlogBundle:Blog');
                $categoryRepository = $em->getRepository('BlogBundle:Category');

                $category = $categoryRepository->findOneBy(array('nom' => $category_name, 'blog' => $b));
                $defaultCategory = $categoryRepository->findOneByNom('general');

                if(!empty($category)){
                    foreach ($category->getPosts() as $p){
                        $p->setCategory($defaultCategory);
                    }

                    $em->remove($category);
                    $em->flush();
                    $request->getSession()->getFlashBag()->add('notice', 'Catégorie supprimé');
                    return $this->redirect($this->generateUrl('blog_view', array('url_blog' => $url_blog)));
                }
                throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ();
            }
        }
        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }


}
