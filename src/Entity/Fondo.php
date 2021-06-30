<?php

namespace App\Entity;

use App\Repository\FondoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FondoRepository::class)
 */
class Fondo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=editorial::class, mappedBy="fondo", orphanRemoval=true)
     */
    private $editorial;

    /**
     * @ORM\ManyToMany(targetEntity=Author::class, inversedBy="fondos")
     */
    private $autores;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $publicacion;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $edicion;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $categoria;

    public function __construct()
    {
        $this->editorial = new ArrayCollection();
        $this->autores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|editorial[]
     */
    public function getEditorial(): Collection
    {
        return $this->editorial;
    }

    public function addEditorial(editorial $editorial): self
    {
        if (!$this->editorial->contains($editorial)) {
            $this->editorial[] = $editorial;
            $editorial->setFondo($this);
        }

        return $this;
    }

    public function removeEditorial(editorial $editorial): self
    {
        if ($this->editorial->removeElement($editorial)) {
            // set the owning side to null (unless already changed)
            if ($editorial->getFondo() === $this) {
                $editorial->setFondo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Author[]
     */
    public function getAutores(): Collection
    {
        return $this->autores;
    }

    public function addAutor(Author $autore): self
    {
        if (!$this->autores->contains($autore)) {
            $this->autores[] = $autore;
        }

        return $this;
    }

    public function removeAutor(Author $autore): self
    {
        $this->autores->removeElement($autore);

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

    public function getString(): ?string
    {
        return $this->string;
    }

    public function setPublicacion(string $publicacion): self
    {
        $this->publicacion = $publicacion;

        return $this;
    }

    public function getEdicion(): ?string
    {
        return $this->edicion;
    }

    public function setEdicion(string $edicion): self
    {
        $this->edicion = $edicion;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }
}
