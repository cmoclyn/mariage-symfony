<?php

namespace App\Entity;

use App\Repository\KidRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KidRepository::class)]
class Kid extends Person
{
    #[ORM\Column]
    private ?int $age = null;

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }
}
