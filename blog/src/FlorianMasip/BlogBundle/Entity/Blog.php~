<?php

// src/FlorianMasip/BlogBundle/Entity/Blog.php

namespace FlorianMasip\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\HttpFoundation\File\UploaderFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="FlorianMasip\BlogBundle\Entity\BlogRepository")
 */
class Blog
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="blogs")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_path", type="string", length=255, nullable=true)
     */
    private $picturePath;

    /**
     *
     * @Assert\file(maxSize="6000000")
     */
    private $pictureFile;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="blog")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="blog")
     * @ORM\OrderBy({"nom" = "ASC"})
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=200)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="url_alias", type="string", length=200, unique=true)
     */
    private $urlAlias;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=1000, unique=false, nullable=true)
     */
    private $description;


    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->categories = new ArrayCollection();
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
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set urlAlias
     *
     * @param string $urlAlias
     *
     * @return Blog
     */
    public function setUrlAlias($urlAlias)
    {
        $this->urlAlias = $urlAlias;

        return $this;
    }

    /**
     * Get urlAlias
     *
     * @return string
     */
    public function getUrlAlias()
    {
        return $this->urlAlias;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Blog
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Blog
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Blog
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set theme
     *
     * @param string $theme
     *
     * @return Blog
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set user
     *
     * @param \FlorianMasip\BlogBundle\Entity\User $user
     *
     * @return Blog
     */
    public function setUser(\FlorianMasip\BlogBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FlorianMasip\BlogBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add post
     *
     * @param \FlorianMasip\BlogBundle\Entity\Post $post
     *
     * @return Blog
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
     * Récupère les posts par la categorie
     *
     * @param \FlorianMasip\BlogBundle\Entity\Category $category
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsByCategory(\FlorianMasip\BlogBundle\Entity\Category $category, $page, $postsPerPage)
    {
        $res = new ArrayCollection();
        if($category != null){
            foreach ($this->posts as $p){
                if($p->getCategory() == $category){
                    $res[] = $p;
                }
            }
        }
        else{
            return $this->posts;
        }

        /*$i = $page * $postsPerPage;
      while(sizeof($res)){

      }
        for ($i =  ($page*$postsPerPage) + 1 ; $i < sizeof($this->posts); $i--){
            $p = $this->posts[$i];
            if($p->getCategory() == $category){
                $res[] = $p;
            }
        }

        return $res;*/
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

    /**
     * Récupère le post par l'url
     *
     * @param string $urlAlias
     * @return Post
     */
    public function getPostByUrlAlias($urlAlias) {
      foreach ($this->posts as $p){
        if($p->getUrlAlias() == $urlAlias){
          return $p;
        }
      }
    }

    /**
     * Récupère le post par l'url et la categorie
     *
     * @param string $urlAlias
     * @param \FlorianMasip\BlogBundle\Entity\Category $category
     * @return Post
     */
    public function getPostByUrlAliasAndCategory($urlAlias, \FlorianMasip\BlogBundle\Entity\Category $category) {
      foreach ($this->posts as $p){
        if($p->getUrlAlias() == $urlAlias and $p->getCategory() == $category){
          return $p;
        }
      }
    }

    /**
     * Add category
     *
     * @param \FlorianMasip\BlogBundle\Entity\Category $category
     *
     * @return Blog
     */
    public function addCategory(\FlorianMasip\BlogBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \FlorianMasip\BlogBundle\Entity\Category $category
     */
    public function removeCategory(\FlorianMasip\BlogBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }


    /**
     * teste si le blog a une catégorie et retourne l'objet
     *
     * @param string $categoryName
     * @return \FlorianMasip\BlogBundle\Entity\Category
     */
    public function hasCategory($categoryName)
    {
        foreach ($this->categories as $c){
          if($c->getNom() == $categoryName){
            return $c;
          }
        }
    }


    /**
     * Set picturePath
     *
     * @param string $picturePath
     *
     * @return Blog
     */
    public function setPicturePath($picturePath)
    {
        $this->picturePath = $picturePath;

        return $this;
    }

    /**
     * Get picturePath
     *
     * @return string
     */
    public function getPicturePath()
    {
        return $this->picturePath;
    }

    /**
     * Set pictureFile
     *
     * @param UploadedFile $pictureFile
     *
     */
    public function setPictureFile($pictureFile)
    {
        $this->$profilePictureFile = $profilePictureFile;

    }

    /**
     * Get pictureFile
     *
     * @return UploadedFile
     */
    public function getPictureFile()
    {
        return $this->pictureFile;
    }
}
