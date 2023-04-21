<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Usuario = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellidos = null;

    #[ORM\Column]
    private ?int $edad = null;

    #[ORM\Column(length: 255)]
    private ?string $población = null;

    #[ORM\Column(length: 255)]
    private ?string $categoría = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_creación = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_modificación = null;

    #[ORM\OneToOne(inversedBy: 'cliente', targetEntity: self::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $cliente = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?cliente $Id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?string
    {
        return $this->Usuario;
    }

    public function setUsuario(string $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getPoblación(): ?string
    {
        return $this->población;
    }

    public function setPoblación(string $población): self
    {
        $this->población = $población;

        return $this;
    }

    public function getCategoría(): ?string
    {
        return $this->categoría;
    }

    public function setCategoría(string $categoría): self
    {
        $this->categoría = $categoría;

        return $this;
    }

    public function getFechaCreación(): ?\DateTimeInterface
    {
        return $this->fecha_creación;
    }

    public function setFechaCreación(\DateTimeInterface $fecha_creación): self
    {
        $this->fecha_creación = $fecha_creación;

        return $this;
    }

    public function getFechaModificación(): ?\DateTimeInterface
    {
        return $this->fecha_modificación;
    }

    public function setFechaModificación(\DateTimeInterface $fecha_modificación): self
    {
        $this->fecha_modificación = $fecha_modificación;

        return $this;
    }

    public function getCliente(): ?self
    {
        return $this->cliente;
    }

    public function setCliente(self $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function setId(cliente $Id): self
    {
        $this->Id = $Id;

        return $this;
    }
}
