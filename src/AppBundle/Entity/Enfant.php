<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Enfant
 *
 * @ORM\Table(name="enfant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnfantRepository")
 */
class Enfant
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeCreation", type="datetime")
     */
    private $dateDeCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=255)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=1)
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="statutLivraison", type="smallint")
     */
    private $statutLivraison;


    /**
     * @ORM\ManyToOne(targetEntity="Cadeau", inversedBy="enfant")
     */
    private $cadeaux;

    /*
     * Constructeur
     */
    public function __construct()
    {
        $this->dateDeCreation = new \DateTime();
        $this->statutLivraison = 0;
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
     * @return Enfant
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Enfant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateDeCreation
     *
     * @param \DateTime $dateDeCreation
     *
     * @return Enfant
     */
    public function setDateDeCreation($dateDeCreation)
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    /**
     * Get dateDeCreation
     *
     * @return \DateTime
     */
    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Enfant
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Enfant
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Enfant
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Enfant
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set statutLivraison
     *
     * @param integer $statutLivraison
     *
     * @return Enfant
     */
    public function setStatutLivraison($statutLivraison)
    {
        $this->statutLivraison = $statutLivraison;

        return $this;
    }

    /**
     * Get statutLivraison
     *
     * @return int
     */
    public function getStatutLivraison()
    {
        return $this->statutLivraison;
    }

    /**
     * Set cadeaux
     *
     * @param \AppBundle\Entity\Cadeau $cadeaux
     *
     * @return Enfant
     */
    public function setCadeaux(\AppBundle\Entity\Cadeau $cadeaux = null)
    {
        $this->cadeaux = $cadeaux;

        return $this;
    }

    /**
     * Get cadeaux
     *
     * @return \AppBundle\Entity\Cadeau
     */
    public function getCadeaux()
    {
        return $this->cadeaux;
    }
}
