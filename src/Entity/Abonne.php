<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbonneRepository")
 */
class Abonne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_abn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $num_compteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_village;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_chef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_quartier;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle_abn;

    /**
     * @ORM\Column(type="date")
     */
    private $date_abn;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais_abn;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Facture", mappedBy="abonne")
     */
    private $factures;

    public function __construct()
    {
        $this->factures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNomAbn(): ?string
    {
        return $this->nom_abn;
    }

    public function setNomAbn(string $nom_abn): self
    {
        $this->nom_abn = $nom_abn;

        return $this;
    }
    public function getNumCompteur(): ?int
    {
        return $this->num_compteur;
    }

    public function setNumCompteur(int $num_compteur): self
    {
        $this->num_compteur = $num_compteur;

        return $this;
    }
    public function getNomVillage(): ?string
    {
        return $this->nom_village;
    }

    public function setNomVillage(string $nom_village): self
    {
        $this->nom_village = $nom_village;

        return $this;
    }

    public function getNomChef(): ?string
    {
        return $this->nom_chef;
    }

    public function setNomChef(string $nom_chef): self
    {
        $this->nom_chef = $nom_chef;

        return $this;
    }

    public function getNomQuartier(): ?string
    {
        return $this->nom_quartier;
    }

    public function setNomQuartier(string $nom_quartier): self
    {
        $this->nom_quartier = $nom_quartier;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->num_tel;
    }

    public function setNumTel(int $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getLibelleAbn(): ?string
    {
        return $this->libelle_abn;
    }

    public function setLibelleAbn(string $libelle_abn): self
    {
        $this->libelle_abn = $libelle_abn;

        return $this;
    }

    public function getDateAbn(): ?\DateTimeInterface
    {
        return $this->date_abn;
    }

    public function setDateAbn(\DateTimeInterface $date_abn): self
    {
        $this->date_abn = $date_abn;

        return $this;
    }

    public function getFraisAbn(): ?int
    {
        return $this->frais_abn;
    }

    public function setFraisAbn(int $frais_abn): self
    {
        $this->frais_abn = $frais_abn;

        return $this;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures[] = $facture;
            $facture->setAbonne($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->factures->contains($facture)) {
            $this->factures->removeElement($facture);
            // set the owning side to null (unless already changed)
            if ($facture->getAbonne() === $this) {
                $facture->setAbonne(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return (string) $this->id; }
}
