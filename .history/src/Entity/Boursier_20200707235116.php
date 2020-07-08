<?php

namespace App\Entity;

use App\Repository\BoursierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoursierRepository::class)
 */
class Boursier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isHoused;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="boursiers")
     */
    private $loger;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getIsHoused(): ?bool
    {
        return $this->isHoused;
    }

    public function setIsHoused(bool $isHoused): self
    {
        $this->isHoused = $isHoused;

        return $this;
    }

    public function getLoger(): ?chambre
    {
        return $this->loger;
    }

    public function setLoger(?chambre $loger): self
    {
        $this->loger = $loger;

        return $this;
    }
}
