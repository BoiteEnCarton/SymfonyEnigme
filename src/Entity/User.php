<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements \Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface
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

    public function __construct()
    {
        $this->userProgressions = new ArrayCollection();
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
}
