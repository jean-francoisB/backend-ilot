<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EnfantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnfantRepository::class)]
#[ApiResource]
class Enfant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dtNaissance = null;



    #[ORM\ManyToOne(inversedBy: 'enfantsGarde')]
    private ?User $nounou = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'enfants')]
    #[ORM\JoinColumn(nullable : false)]
    private Collection $parents;

    #[ORM\OneToMany(mappedBy: 'enfant', targetEntity: Contrat::class)]
    private Collection $contrats;

    public function __construct()
    {
        $this->parents = new ArrayCollection();
        $this->contrats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDtNaissance(): ?\DateTimeInterface
    {
        return $this->dtNaissance;
    }

    public function setDtNaissance(?\DateTimeInterface $dtNaissance): self
    {
        $this->dtNaissance = $dtNaissance;

        return $this;
    }


    public function getNounou(): ?User
    {
        return $this->nounou;
    }

    public function setNounou(?User $nounou): self
    {
        $this->nounou = $nounou;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    public function addParent(User $parent): self
    {
        if (!$this->parents->contains($parent)) {
            $this->parents->add($parent);
        }

        return $this;
    }

    public function removeParent(User $parent): self
    {
        $this->parents->removeElement($parent);

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
            $contrat->setEnfant($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getEnfant() === $this) {
                $contrat->setEnfant(null);
            }
        }

        return $this;
    }

}
