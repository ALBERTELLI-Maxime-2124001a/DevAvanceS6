<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
#[Broadcast]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $artiste = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cover = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $annee = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombre_mus = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $label = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $musiques = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $durees = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getArtiste(): ?string
    {
        return $this->artiste;
    }

    public function setArtiste(?string $artiste): static
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): static
    {
        $this->cover = $cover;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(?\DateTimeInterface $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNombreMus(): ?int
    {
        return $this->nombre_mus;
    }

    public function setNombreMus(?int $nombre_mus): static
    {
        $this->nombre_mus = $nombre_mus;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getMusiques(): ?array
    {
        return $this->musiques;
    }

    public function setMusiques(?array $musiques): static
    {
        $this->musiques = $musiques;

        return $this;
    }

    public function getDurees(): ?array
    {
        return $this->durees;
    }

    public function setDurees(?array $durees): static
    {
        $this->durees = $durees;

        return $this;
    }
}
