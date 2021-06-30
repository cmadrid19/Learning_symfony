<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
 */
class Author
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
    private $type;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Fondo::class, mappedBy="autores")
     */
    private $fondos;

    public function __construct()
    {
        $this->fondos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    /**
     * @return Collection|Fondo[]
     */
    public function getFondos(): Collection
    {
        return $this->fondos;
    }

    public function addFondo(Fondo $fondo): self
    {
        if (!$this->fondos->contains($fondo)) {
            $this->fondos[] = $fondo;
            $fondo->addAutore($this);
        }

        return $this;
    }

    public function removeFondo(Fondo $fondo): self
    {
        if ($this->fondos->removeElement($fondo)) {
            $fondo->removeAutore($this);
        }

        return $this;
    }
}
