<?php

namespace App\Entity;

use App\Repository\NonBoursierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NonBoursierRepository::class)
 */
class NonBoursier
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
    private $adresse;

    /**
     * @ORM\OneToOne(targetEntity=etudiant::class, cascade={"persist", "remove"})
     */
    private $EtudiantNonBoursier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEtudiantNonBoursier(): ?Etudiant
    {
        return $this->EtudiantNonBoursier;
    }

    public function setEtudiantNonBoursier(?Etudiant $EtudiantNonBoursier): self
    {
        $this->EtudiantNonBoursier = $EtudiantNonBoursier;

        return $this;
    }
}
