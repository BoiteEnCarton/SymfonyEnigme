<?php

namespace App\Entity;

use App\Repository\UserProgressionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserProgressionRepository::class)]
class UserProgression
{
//    #[ORM\Id]
//    #[ORM\GeneratedValue]
//    #[ORM\Column]
//    private ?int $id = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'userProgressions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userId = null;

    #[ORM\Id]
    #[ORM\ManyToOne]
    private ?Enigme $enigmeId = null;

    #[ORM\Column]
    private ?int $resultat = null;



    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getEnigmeId(): ?Enigme
    {
        return $this->enigmeId;
    }

    public function setEnigmeId(?Enigme $enigmeId): self
    {
        $this->enigmeId = $enigmeId;

        return $this;
    }

    public function isResultat(): ?int
    {
        return $this->resultat;
    }

    public function setResultat(int $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }
}
