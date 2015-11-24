<?php

namespace FlorianMasip\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FlorianMasip\BlogBundle\Entity\PostRepository")
 */
class Post
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
     * @ORM\Column(name="name", type="string", length=200)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url_alias", type="string", length=200, unique=true)
     */
    private $urlAlias;

    /**
     * @ORM\ManyToOne(targetEntity="Blog", inversedBy="posts")
     * @ORM\JoinColumn(name="id_blog", referencedColumnName="id")
     */
    private $blog;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="categories")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     */
    private $category;


    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=2000)
     */
    private $content;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

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
     * Set name
     *
     * @param string $name
     * @return Post
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
     * Set urlAlias
     *
     * @param string $urlAlias
     * @return Post
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
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get dateCreation
     *
     * @return datetime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateCreation
     *
     * @param datetime $dateCreation
     * @return Post
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }


    /**
     * Set blog
     *
     * @param \FlorianMasip\BlogBundle\Entity\Blog $blog
     *
     * @return Post
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
     * Set category
     *
     * @param \FlorianMasip\BlogBundle\Entity\Category $category
     *
     * @return Post
     */
    public function setCategory(\FlorianMasip\BlogBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \FlorianMasip\BlogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
