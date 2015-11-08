<?php

// src/FlorianMasip/BlogBundle/Entity/Blog.php

namespace FlorianMasip\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

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
    private $url_alias;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=1000, unique=false, nullable=true)
     */
    private $description;


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
     * Set url_alias
     *
     * @param string $url_alias
     *
     * @return Blog
     */
    public function setUrlAlias($url_alias)
    {
        $this->url_alias = $url_alias;

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

    public function getPosts()
    {
        return null;
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
}
