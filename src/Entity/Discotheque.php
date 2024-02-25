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
    private ?array $chansons = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $albums = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $artistes = null;

    /**
     * @param int|null $id
     */
    public function __construct(){}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChansons(): ?array
    {
        return $this->chansons;
    }

    public function setChansons(?array $chansons): static
    {
        $this->chansons = $chansons;

        return $this;
    }

    public function getAlbums(): ?array
    {
        return $this->albums;
    }

    public function setAlbums(?array $albums): static
    {
        $this->albums = $albums;

        return $this;
    }

    public function getArtistes(): ?array
    {
        return $this->artistes;
    }

    public function setArtistes(?array $artistes): static
    {
        $this->artistes = $artistes;

        return $this;
    }
}
