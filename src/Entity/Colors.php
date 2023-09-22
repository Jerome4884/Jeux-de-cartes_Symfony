<?php

namespace App\Entity;

use App\Repository\ColorsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorsRepository::class)]
class Colors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $couleurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleurs(): ?string
    {
        return $this->couleurs;
    }

    public function setCouleurs(string $couleurs): static
    {
        $this->couleurs = $couleurs;

        return $this;
    }
}
