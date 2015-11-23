<?php

namespace FlorianMasip\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoryController extends Controller
{

    public function listeAction($url_blog) {
        $em = $this->getDoctrine()->getManager();
        $liste_category = $em->getRepository('BlogBundle:Category')
                ->findAllByNomCategory();

        // Appel du template en passant la liste en params
        return $this->render('BlogBundle:Category:liste.html.twig', array('url_blog' => $url_blog, 'liste_category' => $liste_category));
    }

    /**
     * @Route("/category/{nom_category}", name="blog_category_show")
     * @Route("/category/{nom_category}/{page}", name="blog_category_show_page")
     */
    public function showAction($page = 1, $nom_category = null) {

        // Réquète pour récupérer les 5 derniers post
        $maxPosts = 5;
        $liste_post = $this->getDoctrine()->getRepository('BlogBundle:Post')->getList($page, $maxPosts, $nom_category);
        $nb_post = count($liste_post);

        // Paramètre du pagination
        $pagination = array(
            'page' => $page,
            'route' => "blog_category_show_page",
            'route_index' => "blog_category_show",
            'pages_count' => ceil($nb_post / $maxPosts),
            'route_params' => array("nom_category" => $nom_category)
        );

        // Appel du template en passant la liste en params
        return $this->render('BlogBundle:Default:index.html.twig', array('liste_post' => $liste_post, 'pagination' => $pagination, 'nom_category' => $nom_category));
    }


}
