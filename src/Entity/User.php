<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Diploma", mappedBy="user")
     */
    private $diploma;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Skill", mappedBy="user")
     */
    private $skill;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SpeakingLanguage", mappedBy="user")
     */
    private $speakingLanguage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $summary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    public function __construct()
    {
        $this->diploma = new ArrayCollection();
        $this->skill = new ArrayCollection();
        $this->speakingLanguage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Diploma[]
     */
    public function getDiploma(): Collection
    {
        return $this->diploma;
    }

    public function addDiploma(Diploma $diploma): self
    {
        if (!$this->diploma->contains($diploma)) {
            $this->diploma[] = $diploma;
            $diploma->setUser($this);
        }

        return $this;
    }

    public function removeDiploma(Diploma $diploma): self
    {
        if ($this->diploma->contains($diploma)) {
            $this->diploma->removeElement($diploma);
            // set the owning side to null (unless already changed)
            if ($diploma->getUser() === $this) {
                $diploma->setUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->description;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkill(): Collection
    {
        return $this->skill;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skill->contains($skill)) {
            $this->skill[] = $skill;
            $skill->setUser($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skill->contains($skill)) {
            $this->skill->removeElement($skill);
            // set the owning side to null (unless already changed)
            if ($skill->getUser() === $this) {
                $skill->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SpeakingLanguage[]
     */
    public function getSpeakingLanguage(): Collection
    {
        return $this->speakingLanguage;
    }

    public function addSpeakingLanguage(SpeakingLanguage $speakingLanguage): self
    {
        if (!$this->speakingLanguage->contains($speakingLanguage)) {
            $this->speakingLanguage[] = $speakingLanguage;
            $speakingLanguage->setUser($this);
        }

        return $this;
    }

    public function removeSpeakingLanguage(SpeakingLanguage $speakingLanguage): self
    {
        if ($this->speakingLanguage->contains($speakingLanguage)) {
            $this->speakingLanguage->removeElement($speakingLanguage);
            // set the owning side to null (unless already changed)
            if ($speakingLanguage->getUser() === $this) {
                $speakingLanguage->setUser(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

}
