<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HumanProject", mappedBy="category")
     */
    private $humanProjects;

    public function __construct()
    {
        $this->humanProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|HumanProject[]
     */
    public function getHumanProjects(): Collection
    {
        return $this->humanProjects;
    }

    public function addHumanProject(HumanProject $humanProject): self
    {
        if (!$this->humanProjects->contains($humanProject)) {
            $this->humanProjects[] = $humanProject;
            $humanProject->setCategory($this);
        }

        return $this;
    }

    public function removeHumanProject(HumanProject $humanProject): self
    {
        if ($this->humanProjects->contains($humanProject)) {
            $this->humanProjects->removeElement($humanProject);
            // set the owning side to null (unless already changed)
            if ($humanProject->getCategory() === $this) {
                $humanProject->setCategory(null);
            }
        }

        return $this;
    }
}
