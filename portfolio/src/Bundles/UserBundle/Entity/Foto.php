<?php

namespace Bundles\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Foto
 *
 * @ORM\Table(name="foto")
 * @ORM\Entity(repositoryClass="Bundles\UserBundle\Repository\FotoRepository")
 */
class Foto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, unique=true)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Foto
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Foto
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

   /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="Foto")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
    */
   protected $user;

    /**
     * Set user
     *
     * @param \Bundles\UserBundle\Entity\User $user
     *
     * @return Foto
     */
    public function setUser(\Bundles\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Bundles\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
