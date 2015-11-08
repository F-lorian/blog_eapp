<?php

namespace Sfobis\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sfobis\BlogBundle\Entity\PostRepository")
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
    private $url_alias;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_category", type="text", length=255)
     */
    private $nom_category;
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
    private $date_creation;

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
     * Set url_alias
     *
     * @param string $urlAlias
     * @return Post
     */
    public function setUrlAlias($urlAlias)
    {
        $this->url_alias = $urlAlias;

        return $this;
    }

    /**
     * Get url_alias
     *
     * @return string 
     */
    public function getUrlAlias()
    {
        return $this->url_alias;
    }

    /**
     * Set nom_category
     *
     * @param string $nom_category
     * @return Post
     */
    public function setNomCategory($nom_category)
    {
        $this->nom_category = $nom_category;

        return $this;
    }

    /**
     * Get nom_category
     *
     * @return string 
     */
    public function getNomCategory()
    {
        return $this->nom_category;
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
     * Get date_creation
     *
     * @return datetime
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }
    
    /**
     * Set date_creation
     *
     * @param datetime $date_creation
     * @return Post
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }
    
}