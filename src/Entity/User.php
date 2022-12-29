<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: UserProgression::class)]
    private Collection $userProgressions;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: ReponseEnigmeUn::class)]
    private Collection $reponseEnigmeUns;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    public function __construct()
    {
        $this->userProgressions = new ArrayCollection();
        $this->reponseEnigmeUns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, UserProgression>
     */
    public function getUserProgressions(): Collection
    {
        return $this->userProgressions;
    }

    public function addUserProgression(UserProgression $userProgression): self
    {
        if (!$this->userProgressions->contains($userProgression)) {
            $this->userProgressions->add($userProgression);
            $userProgression->setUserId($this);
        }

        return $this;
    }

    public function removeUserProgression(UserProgression $userProgression): self
    {
        if ($this->userProgressions->removeElement($userProgression)) {
            // set the owning side to null (unless already changed)
            if ($userProgression->getUserId() === $this) {
                $userProgression->setUserId(null);
            }
        }

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
            $reponseEnigmeUn->setUserId($this);
        }

        return $this;
    }

    public function removeReponseEnigmeUn(ReponseEnigmeUn $reponseEnigmeUn): self
    {
        if ($this->reponseEnigmeUns->removeElement($reponseEnigmeUn)) {
            // set the owning side to null (unless already changed)
            if ($reponseEnigmeUn->getUserId() === $this) {
                $reponseEnigmeUn->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }
}
