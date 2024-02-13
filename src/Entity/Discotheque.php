<?php

namespace App\Entity;

use App\Repository\DiscothequeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: DiscothequeRepository::class)]
#[Broadcast]
class Discotheque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $Chansons = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $Albums = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChansons(): ?array
    {
        return $this->Chansons;
    }

    public function setChansons(?array $Chansons): static
    {
        $this->Chansons = $Chansons;

        return $this;
    }

    public function getAlbums(): ?array
    {
        return $this->Albums;
    }

    public function setAlbums(?array $Albums): static
    {
        $this->Albums = $Albums;

        return $this;
    }
}
