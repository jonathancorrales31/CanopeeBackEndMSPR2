<?php

namespace App\Entity;

use App\Repository\PrestationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PrestationsRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['prestation:read']]
)]
class Prestations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['prestation:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['prestation:read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['prestation:read'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['prestation:read'])]
    private ?string $price = null;

    /**
     * @var Collection<int, DevisPrestation>
     */
    #[ORM\OneToMany(targetEntity: DevisPrestation::class, mappedBy: 'prestation')]
    private Collection $devisPrestations;

    /**
     * @var Collection<int, Image>
     */
    #[ORM\OneToMany(targetEntity: Image::class, mappedBy: 'prestation')]
    private Collection $images;

    public function __construct()
    {
        $this->devisPrestations = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function __toString(): string
{
    return $this->name ?? 'Prestation';
}

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

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
            $devisPrestation->setPrestation($this);
        }

        return $this;
    }

    public function removeDevisPrestation(DevisPrestation $devisPrestation): static
    {
        if ($this->devisPrestations->removeElement($devisPrestation)) {
            // set the owning side to null (unless already changed)
            if ($devisPrestation->getPrestation() === $this) {
                $devisPrestation->setPrestation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setPrestation($this);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getPrestation() === $this) {
                $image->setPrestation(null);
            }
        }

        return $this;
    }
}
