<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
class Model
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idmodel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    
    private function generateId()
    {
        $newRandomId = substr("ID".str_shuffle(uniqid()), 0, 9);
        return $newRandomId;
    }

    public function __construct()
    {
        $this->date = new DateTime();
        $this->idmodel = $this->generateId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdmodel(): ?string
    {
        return $this->idmodel;
    }

    public function setIdmodel(string $idmodel): self
    {
        $this->idmodel = $idmodel;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
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

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

}
