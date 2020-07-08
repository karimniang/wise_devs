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





    public function getId(): ?int
    {
        return $this->id;
    }
}
