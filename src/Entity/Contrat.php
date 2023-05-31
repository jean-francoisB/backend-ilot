<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
#[ApiResource]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $temps = null;

    #[ORM\Column(nullable: true)]
    private ?float $tarif = null;

    #[ORM\ManyToMany(targetEntity: Heures::class, inversedBy: 'contrats')]
    private Collection $horaires;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Enfant $enfant = null;

    public function __construct()
    {
        $this->horaires = new ArrayCollection();
    }







    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemps(): ?string
    {
        return $this->temps;
    }

    public function setTemps(?string $temps): self
    {
        $this->temps = $temps;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(?float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * @return Collection<int, Heures>
     */
    public function getHoraires(): Collection
    {
        return $this->horaires;
    }

    public function addHoraire(Heures $horaire): self
    {
        if (!$this->horaires->contains($horaire)) {
            $this->horaires->add($horaire);
        }

        return $this;
    }

    public function removeHoraire(Heures $horaire): self
    {
        $this->horaires->removeElement($horaire);

        return $this;
    }

    public function getEnfant(): ?Enfant
    {
        return $this->enfant;
    }

    public function setEnfant(?Enfant $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }


}
