<?php

namespace App\Entity;

use App\Repository\ScreenshotRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ScreenshotRepository::class)
 */
class Screenshot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255", allowEmptyString="false", maxMessage="Ce champ est trop long")
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide")
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255", allowEmptyString="false", maxMessage="Ce champ est trop long")
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide")
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="screenshot")
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */
    private $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
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

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}
