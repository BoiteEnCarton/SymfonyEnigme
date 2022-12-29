<?php

namespace App\Entity;

use App\Repository\ReponseEnigmeUnRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseEnigmeUnRepository::class)]
class ReponseEnigmeUn
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse = null;

    #[ORM\ManyToOne(inversedBy: 'reponseEnigmeUns')]
    private ?Enigme $idEnigme = null;

//    #[ORM\ManyToOne(inversedBy: 'reponseEnigmeUns')]
    #[ORM\ManyToOne(inversedBy: 'reponseEnigmeUns')]
//    #[ORM\JoinColumn(nullable: false)]
    private ?User $userId = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReponse(): ?string
    {
        return $this->Reponse;
    }

    public function setReponse(string $Reponse): self
    {
        $this->Reponse = $Reponse;

        return $this;
    }

    public function getIdEnigme(): ?Enigme
    {
        return $this->idEnigme;
    }

    public function setIdEnigme(?Enigme $idEnigme): self
    {
        $this->idEnigme = $idEnigme;

        return $this;
    }

//    public function getUserId(): ?User
//    {
//        return $this->userId;
//    }
//
//    public function setUserId(?User $userId): self
//    {
//        $this->userId = $userId;
//
//        return $this;
//    }

public function getUserId(): ?User
{
    return $this->userId;
}

public function setUserId(?User $userId): self
{
    $this->userId = $userId;

    return $this;
}


}
