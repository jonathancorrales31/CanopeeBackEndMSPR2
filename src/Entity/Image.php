<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;


#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['image:read']]
)]

#[ApiFilter(SearchFilter::class, properties: [
    'type' => 'exact',
])]
#[ApiFilter(OrderFilter::class, properties: [
    'ordreAffichage'
])]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['image:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['image:read'])]
    private ?string $url = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['image:read'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['image:read'])]
    private ?int $ordreAffichage = null;

    #[ORM\Column(length: 255)]
    #[Groups(['image:read'])]
    private ?string $type = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups(['image:read'])]
    private ?Prestations $prestation = null;
    
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

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

    public function getOrdreAffichage(): ?int
    {
        return $this->ordreAffichage;
    }

    public function setOrdreAffichage(int $ordreAffichage): static
    {
        $this->ordreAffichage = $ordreAffichage;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPrestation(): ?Prestations
    {
        return $this->prestation;
    }

    public function setPrestation(?Prestations $prestation): static
    {
        $this->prestation = $prestation;

        return $this;
    }

#[Groups(['image:read'])]
public function getPrestationId(): ?int
{
    return $this->prestation?->getId();
}
}
