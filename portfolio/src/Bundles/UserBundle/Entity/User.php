<?php

namespace Bundles\UserBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Bundles\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


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
   * @ORM\OneToMany(targetEntity="Foto", mappedBy="User")
   */
    protected $foto;

    /**
     * Add foto
     *
     * @param \Bundles\UserBundle\Entity\Foto $foto
     *
     * @return User
     */
    public function addFoto(\Bundles\UserBundle\Entity\Foto $foto)
    {
        $this->foto[] = $foto;

        return $this;
    }

    /**
     * Remove foto
     *
     * @param \Bundles\UserBundle\Entity\Foto $foto
     */
    public function removeFoto(\Bundles\UserBundle\Entity\Foto $foto)
    {
        $this->foto->removeElement($foto);
    }

    /**
     * Get foto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFoto()
    {
        return $this->foto;
    }
}
