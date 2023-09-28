<?php

namespace App\Entity;

use App\Repository\CartesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartesRepository::class)]

class Cards
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column(length: 255)]
    private ?string $string = null;

    public function getString(): ?string
    {
        return $this->string;
    }
    public function setString(string $string): static
    {
        $this->color = $string;

        return $this;
    }

    #[ORM\Column(length: 10)]
    private ?string $color = null;

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    #[ORM\Column(length: 10)]
    private ?string $value = null;

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    // #[ORM\Column(type:'integer')]
    // private $rand;

    // public function getRand()
    // {
    //     return $this->rand;
    // }

    // public function setRand($rand)
    // {
    //     $this->rand = $rand;
    // }

}

