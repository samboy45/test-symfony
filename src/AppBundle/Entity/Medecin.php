<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medecin
 *
 * @ORM\Table(name="medecin")
 * @ORM\Entity
 */
class Medecin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="rpps", type="string", length=25, nullable=true)
     */
    private $rpps;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Patient", mappedBy="medecin")
     */
    private $patients;

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
     * @return Medecin
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
     * @return Medecin
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
     * Set rpps
     *
     * @param string $rpps
     * @return Medecin
     */
    public function setRpps($rpps)
    {
        $this->rpps = $rpps;

        return $this;
    }

    /**
     * Get rpps
     *
     * @return string 
     */
    public function getRpps()
    {
        return $this->rpps;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add patients
     *
     * @param \AppBundle\Entity\Medecin $patients
     * @return Medecin
     */
    public function addPatient(\AppBundle\Entity\Medecin $patients)
    {
        $this->patients[] = $patients;

        return $this;
    }

    /**
     * Remove patients
     *
     * @param \AppBundle\Entity\Medecin $patients
     */
    public function removePatient(\AppBundle\Entity\Medecin $patients)
    {
        $this->patients->removeElement($patients);
    }

    /**
     * Get patients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPatients()
    {
        return $this->patients;
    }
}
