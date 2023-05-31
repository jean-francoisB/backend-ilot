<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HeuresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeuresRepository::class)]
#[ApiResource]
class Heures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lundi_start = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mardi_start = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mercredi_start = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $jeudi_start = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $vendredi_start = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lundi_end = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mardi_end = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mercredi_end = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $jeudi_end = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $vendredi_end = null;

    #[ORM\ManyToMany(targetEntity: Contrat::class, mappedBy: 'horaires')]
    private Collection $contrats;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLundiStart(): ?\DateTimeInterface
    {
        return $this->lundi_start;
    }

    public function setLundiStart(?\DateTimeInterface $lundi_start): self
    {
        $this->lundi_start = $lundi_start;

        return $this;
    }

    public function getMardiStart(): ?\DateTimeInterface
    {
        return $this->mardi_start;
    }

    public function setMardiStart(?\DateTimeInterface $mardi_start): self
    {
        $this->mardi_start = $mardi_start;

        return $this;
    }

    public function getMercrediStart(): ?\DateTimeInterface
    {
        return $this->mercredi_start;
    }

    public function setMercrediStart(?\DateTimeInterface $mercredi_start): self
    {
        $this->mercredi_start = $mercredi_start;

        return $this;
    }

    public function getJeudiStart(): ?\DateTimeInterface
    {
        return $this->jeudi_start;
    }

    public function setJeudiStart(?\DateTimeInterface $jeudi_start): self
    {
        $this->jeudi_start = $jeudi_start;

        return $this;
    }

    public function getVendrediStart(): ?\DateTimeInterface
    {
        return $this->vendredi_start;
    }

    public function setVendrediStart(?\DateTimeInterface $vendredi_start): self
    {
        $this->vendredi_start = $vendredi_start;

        return $this;
    }

    public function getLundiEnd(): ?\DateTimeInterface
    {
        return $this->lundi_end;
    }

    public function setLundiEnd(?\DateTimeInterface $lundi_end): self
    {
        $this->lundi_end = $lundi_end;

        return $this;
    }

    public function getMardiEnd(): ?\DateTimeInterface
    {
        return $this->mardi_end;
    }

    public function setMardiEnd(?\DateTimeInterface $mardi_end): self
    {
        $this->mardi_end = $mardi_end;

        return $this;
    }

    public function getMercrediEnd(): ?\DateTimeInterface
    {
        return $this->mercredi_end;
    }

    public function setMercrediEnd(?\DateTimeInterface $mercredi_end): self
    {
        $this->mercredi_end = $mercredi_end;

        return $this;
    }

    public function getJeudiEnd(): ?\DateTimeInterface
    {
        return $this->jeudi_end;
    }

    public function setJeudiEnd(?\DateTimeInterface $jeudi_end): self
    {
        $this->jeudi_end = $jeudi_end;

        return $this;
    }

    public function getVendrediEnd(): ?\DateTimeInterface
    {
        return $this->vendredi_end;
    }

    public function setVendrediEnd(?\DateTimeInterface $vendredi_end): self
    {
        $this->vendredi_end = $vendredi_end;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats->add($contrat);
            $contrat->addHoraire($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            $contrat->removeHoraire($this);
        }

        return $this;
    }


}
