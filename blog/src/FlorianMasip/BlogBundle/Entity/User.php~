<?php

// src/FlorianMasip/BlogBundle/Entity/User.php

namespace FlorianMasip\BlogBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\HttpFoundation\File\UploaderFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="FlorianMasip\BlogBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic

        $this->blogs = new ArrayCollection();
        $this->comments = new ArrayCollection();

    }

    /**
     * @var string
     *
     * @ORM\Column(name="profile_picture_path", type="string", length=255, nullable=true)
     */
    private $profilePicturePath;

    /**
     *
     * @Assert\file(maxSize="6000000")
     */
    private $profilePictureFile;

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../Resources/public/img';
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'images';
    }

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", length=3, nullable=true)
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity="Blog", mappedBy="user")
     */
    private $blogs;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments;

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get blogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlogs()
    {
        return $this->blogs;
    }

    /**
     * Add blog
     *
     * @param \FlorianMasip\BlogBundle\Entity\Blog $blog
     *
     * @return User
     */
    public function addBlog(\FlorianMasip\BlogBundle\Entity\Blog $blog)
    {
        $this->blogs[] = $blog;

        return $this;
    }

    /**
     * Remove blog
     *
     * @param \FlorianMasip\BlogBundle\Entity\Blog $blog
     */
    public function removeBlog(\FlorianMasip\BlogBundle\Entity\Blog $blog)
    {
        $this->blogs->removeElement($blog);
    }



    /**
     * Set profilePicturePath
     *
     * @param string $profilePicturePath
     *
     * @return User
     */
    public function setProfilePicturePath($profilePicturePath)
    {
        $this->profilePicturePath = $profilePicturePath;

        return $this;
    }

    /**
     * Get profilePicturePath
     *
     * @return string
     */
    public function getProfilePicturePath()
    {
        return $this->profilePicturePath;
    }

    /**
     * Set profilePictureFile
     *
     * @param UploadedFile $profilePictureFile
     *
     */
    public function setProfilePictureFile($profilePictureFile)
    {
        $this->$profilePictureFile = $profilePictureFile;

    }

    /**
     * Get profilePictureFile
     *
     * @return UploadedFile
     */
    public function getProfilePictureFile()
    {
        return $this->profilePictureFile;
    }



    /**
     * Add comment
     *
     * @param \FlorianMasip\BlogBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\FlorianMasip\BlogBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \FlorianMasip\BlogBundle\Entity\Comment $comment
     */
    public function removeComment(\FlorianMasip\BlogBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
