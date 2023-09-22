<?php

namespace App\Entity;

use App\Repository\ValuesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValuesRepository::class)]
#[ORM\Table(name: '`values`')]
class Values
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $valeurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeurs(): ?string
    {
        return $this->valeurs;
    }

    public function setValeurs(string $valeurs): static
    {
        $this->valeurs = $valeurs;

        return $this;
    }
}
