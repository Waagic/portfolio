<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $baseline;

    /**
     * @ORM\Column(type="text")
     */
    private $description1;

    /**
     * @ORM\ManyToMany(targetEntity=Language::class, inversedBy="project")
     */
    private $language;

    /**
     * @ORM\Column(type="text")
     */
    private $description2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\OneToMany(
     *     targetEntity=Screenshot::class,
     *     mappedBy="project",
     *     orphanRemoval=true,
     *     fetch="EXTRA_LAZY",
     *     cascade={"persist"}
     *     )
     */
    private $screenshot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cover;

    public function __construct()
    {
        $this->language = new ArrayCollection();
        $this->screenshot = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(string $baseline): self
    {
        $this->baseline = $baseline;

        return $this;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(string $description): self
    {
        $this->description1 = $description;

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->language->contains($language)) {
            $this->language[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        if ($this->language->contains($language)) {
            $this->language->removeElement($language);
        }

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|Screenshot[]
     */
    public function getScreenshot(): Collection
    {
        return $this->screenshot;
    }

    public function addScreenshot(Screenshot $screenshot): self
    {
        if (!$this->screenshot->contains($screenshot)) {
            $this->screenshot[] = $screenshot;
            $screenshot->setProject($this);
        }

        return $this;
    }

    public function removeScreenshot(Screenshot $screenshot): self
    {
        if ($this->screenshot->contains($screenshot)) {
            $this->screenshot->removeElement($screenshot);
            // set the owning side to null (unless already changed)
            if ($screenshot->getProject() === $this) {
                $screenshot->setProject(null);
            }
        }

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }
}
