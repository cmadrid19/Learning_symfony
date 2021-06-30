<?php

namespace App\Entity;

use App\Repository\EditorialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditorialRepository::class)
 */
class Editorial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Fondo::class, inversedBy="editorial")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fondo;

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

    public function getFondo(): ?Fondo
    {
        return $this->fondo;
    }

    public function setFondo(?Fondo $fondo): self
    {
        $this->fondo = $fondo;

        return $this;
    }
}
