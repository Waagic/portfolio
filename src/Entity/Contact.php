<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Le message ne devrait pas être vide")
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=180)
     * @Assert\Email(message="Veuillez rentrer une adresse mail valide")
     * @Assert\Length(max="180", allowEmptyString="false")
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide")
     */
    private $mail;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Length(max="10", allowEmptyString="false", maxMessage="Veuillez entrer un numéro à 10 chiffres")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Le numéro de téléphone ne doit contenir que des chiffres")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255", allowEmptyString="false", maxMessage="Ce champ est trop long")
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide")
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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
}
