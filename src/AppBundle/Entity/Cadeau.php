<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cadeau
 *
 * @ORM\Table(name="cadeau")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CadeauRepository")
 */
class Cadeau
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="urlImage", type="string", length=255)
     */
    private $urlImage;

    /**
     * @var int
     *
     * @ORM\Column(name="statutFabrication", type="smallint")
     */
    private $statutFabrication;

    /**
     * @ORM\OneToMany(targetEntity="Enfant", mappedBy="cadeaux")
     */
    private $enfant;


    /* Custom Methods
    *
    */

    public function __toString()
    {
        return $this->nom;
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Cadeau
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
     * Set urlImage
     *
     * @param string $urlImage
     *
     * @return Cadeau
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * Get urlImage
     *
     * @return string
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }

    /**
     * Set statutFabrication
     *
     * @param integer $statutFabrication
     *
     * @return Cadeau
     */
    public function setStatutFabrication($statutFabrication)
    {
        $this->statutFabrication = $statutFabrication;

        return $this;
    }

    /**
     * Get statutFabrication
     *
     * @return int
     */
    public function getStatutFabrication()
    {
        return $this->statutFabrication;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enfant = new \Doctrine\Common\Collections\ArrayCollection();
        $this->statutFabrication = 0;
        $this->urlImage = 'url';
    }

    /**
     * Add enfant
     *
     * @param \AppBundle\Entity\Enfant $enfant
     *
     * @return Cadeau
     */
    public function addEnfant(\AppBundle\Entity\Enfant $enfant)
    {
        $this->enfant[] = $enfant;

        return $this;
    }

    /**
     * Remove enfant
     *
     * @param \AppBundle\Entity\Enfant $enfant
     */
    public function removeEnfant(\AppBundle\Entity\Enfant $enfant)
    {
        $this->enfant->removeElement($enfant);
    }

    /**
     * Get enfant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnfant()
    {
        return $this->enfant;
    }
}
