<?php

namespace FlorianMasip\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FlorianMasip\BlogBundle\Entity\CategoryRepository")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Blog", inversedBy="categories")
     * @ORM\JoinColumn(name="id_blog", referencedColumnName="id", onDelete="CASCADE")
     */
    private $blog;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="category")
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Category
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set blog
     *
     * @param \FlorianMasip\BlogBundle\Entity\Blog $blog
     *
     * @return Category
     */
    public function setBlog(\FlorianMasip\BlogBundle\Entity\Blog $blog = null)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return \FlorianMasip\BlogBundle\Entity\Blog
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Add post
     *
     * @param \FlorianMasip\BlogBundle\Entity\Post $post
     *
     * @return Category
     */
    public function addPost(\FlorianMasip\BlogBundle\Entity\Post $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \FlorianMasip\BlogBundle\Entity\Post $post
     */
    public function removePost(\FlorianMasip\BlogBundle\Entity\Post $post)
    {
        $this->posts->removeElement($post);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Get posts by url alias
     *
     * @param string $urlAlias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
     public function getPostByUrlAlias($urlAlias) {
       foreach ($this->posts as $p){
         if($p->getUrlAlias() == $urlAlias){
           return $p;
         }
       }
     }

    /**
     * Get nbPosts
     *
     * @return integer
     */
    public function getNbPosts()
    {
        return count($this->posts);
    }

}
