<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
#[ApiResource]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $date = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $budget = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $client = null;

    /**
     * @var Collection<int, DevisPrestation>
     */
    #[ORM\OneToMany(targetEntity: DevisPrestation::class, mappedBy: 'devis', orphanRemoval: true)]
    private Collection $devisPrestations;

    public function __construct()
    {
        $this->devisPrestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getBudget(): ?string
    {
        return $this->budget;
    }

    public function setBudget(string $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): static
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, DevisPrestation>
     */
    public function getDevisPrestations(): Collection
    {
        return $this->devisPrestations;
    }

    public function addDevisPrestation(DevisPrestation $devisPrestation): static
    {
        if (!$this->devisPrestations->contains($devisPrestation)) {
            $this->devisPrestations->add($devisPrestation);
            $devisPrestation->setDevis($this);
        }

        return $this;
    }

    public function removeDevisPrestation(DevisPrestation $devisPrestation): static
    {
        if ($this->devisPrestations->removeElement($devisPrestation)) {
            // set the owning side to null (unless already changed)
            if ($devisPrestation->getDevis() === $this) {
                $devisPrestation->setDevis(null);
            }
        }

        return $this;
    }
}
