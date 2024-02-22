<?php

namespace App\Entity;

use App\Repository\ChansonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ChansonRepository::class)]
#[Broadcast]
class Chanson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Publication = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Artiste = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Label = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Cover = null;

    #[ORM\Column(nullable: true)]
    private ?int $Duree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $style = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPublication(): ?\DateTimeInterface
    {
        return $this->Publication;
    }

    public function setPublication(?\DateTimeInterface $Publication): static
    {
        $this->Publication = $Publication;

        return $this;
    }

    public function getArtiste(): ?string
    {
        return $this->Artiste;
    }

    public function setArtiste(?string $Artiste): static
    {
        $this->Artiste = $Artiste;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->Label;
    }

    public function setLabel(?string $Label): static
    {
        $this->Label = $Label;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->Cover;
    }

    public function setCover(?string $Cover): static
    {
        $this->Cover = $Cover;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(?int $Duree): static
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(?string $style): static
    {
        $this->style = $style;

        return $this;
    }
}
