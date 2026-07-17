<?php

namespace App\Entity;

use App\Repository\DevisPrestationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: DevisPrestationRepository::class)]
#[ApiResource]
class DevisPrestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantité = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\ManyToOne(inversedBy: 'devisPrestations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Devis $devis = null;

    #[ORM\ManyToOne(inversedBy: 'devisPrestations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prestations $prestation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantité(): ?int
    {
        return $this->quantité;
    }

    public function setQuantité(int $quantité): static
    {
        $this->quantité = $quantité;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDevis(): ?devis
    {
        return $this->devis;
    }

    public function setDevis(?devis $devis): static
    {
        $this->devis = $devis;

        return $this;
    }

    public function getPrestation(): ?prestations
    {
        return $this->prestation;
    }

    public function setPrestation(?prestations $prestation): static
    {
        $this->prestation = $prestation;

        return $this;
    }
}
