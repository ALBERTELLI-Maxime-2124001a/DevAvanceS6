<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Broadcast]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $mail = null;

    #[ORM\Column(length: 50)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 250)]
    private ?string $mdp = null;

    #[ORM\OneToOne(targetEntity: Discotheque::class)]
    private ?Discotheque $discotheque = null;

    /**
     * @param string|null $mail
     * @param string|null $pseudo
     * @param string|null $mdp
     */
    public function __construct(?string $mail, ?string $pseudo, ?string $mdp, ?Discotheque $discotheque)
    {
        $this->mail = $mail;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->discotheque = $discotheque;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getDiscotheque(): ?Discotheque
    {
        return $this->discotheque;
    }

    public function setDiscotheque(Discothequed $discotheque): static
    {
        $this->discotheque = $discotheque;

        return $this;
    }
}
