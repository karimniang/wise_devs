<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
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
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_bat;

    /**
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="loger")
     */
    private $boursiers;

    public function __construct()
    {
        $this->boursiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumeroBat(): ?int
    {
        return $this->numero_bat;
    }

    public function setNumeroBat(int $numero_bat): self
    {
        $this->numero_bat = $numero_bat;

        return $this;
    }

    /**
     * @return Collection|Etudiant[]
     */
    public function getBoursiers(): Collection
    {
        return $this->boursiers;
    }

    public function addBoursier(Etudiant $boursier): self
    {
        if (!$this->boursiers->contains($boursier)) {
            $this->boursiers[] = $boursier;
            $boursier->setLoger($this);
        }

        return $this;
    }

    public function removeBoursier(Etudiant $boursier): self
    {
        if ($this->boursiers->contains($boursier)) {
            $this->boursiers->removeElement($boursier);
            // set the owning side to null (unless already changed)
            if ($boursier->getLoger() === $this) {
                $boursier->setLoger(null);
            }
        }

        return $this;
    }
}
