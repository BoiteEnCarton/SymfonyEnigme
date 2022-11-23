<?php

namespace App\Entity;

use App\Repository\EnigmeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnigmeRepository::class)]
class Enigme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\OneToMany(mappedBy: 'idEnigme', targetEntity: ReponseEnigmeUn::class)]
    private Collection $reponseEnigmeUns;

    public function __construct()
    {
        $this->reponseEnigmeUns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection<int, ReponseEnigmeUn>
     */
    public function getReponseEnigmeUns(): Collection
    {
        return $this->reponseEnigmeUns;
    }

    public function addReponseEnigmeUn(ReponseEnigmeUn $reponseEnigmeUn): self
    {
        if (!$this->reponseEnigmeUns->contains($reponseEnigmeUn)) {
            $this->reponseEnigmeUns->add($reponseEnigmeUn);
            $reponseEnigmeUn->setIdEnigme($this);
        }

        return $this;
    }

    public function removeReponseEnigmeUn(ReponseEnigmeUn $reponseEnigmeUn): self
    {
        if ($this->reponseEnigmeUns->removeElement($reponseEnigmeUn)) {
            // set the owning side to null (unless already changed)
            if ($reponseEnigmeUn->getIdEnigme() === $this) {
                $reponseEnigmeUn->setIdEnigme(null);
            }
        }

        return $this;
    }
}
