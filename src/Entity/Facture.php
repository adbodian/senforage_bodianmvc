<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $num_compteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_abn;

    /**
     * @ORM\Column(type="date")
     */
    private $date_facture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anc_consommation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nouv_consommation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $solde;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $solde_anterieur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $total_facture;

    /**
     * @ORM\Column(type="date")
     */
    private $date_limite_paiement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Abonne", inversedBy="factures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $abonne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCompteur(): ?string
    {
        return $this->num_compteur;
    }

    public function setNumCompteur(string $num_compteur): self
    {
        $this->num_compteur = $num_compteur;

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

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): self
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getAncConsommation(): ?int
    {
        return $this->anc_consommation;
    }

    public function setAncConsommation(?int $anc_consommation): self
    {
        $this->anc_consommation = $anc_consommation;

        return $this;
    }

    public function getNouvConsommation(): ?int
    {
        return $this->nouv_consommation;
    }

    public function setNouvConsommation(?int $nouv_consommation): self
    {
        $this->nouv_consommation = $nouv_consommation;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(?int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getSoldeAnterieur(): ?int
    {
        return $this->solde_anterieur;
    }

    public function setSoldeAnterieur(?int $solde_anterieur): self
    {
        $this->solde_anterieur = $solde_anterieur;

        return $this;
    }

    public function getTotalFacture(): ?int
    {
        return $this->total_facture;
    }

    public function setTotalFacture(?int $total_facture): self
    {
        $this->total_facture = $total_facture;

        return $this;
    }

    public function getDateLimitePaiement(): ?\DateTimeInterface
    {
        return $this->date_limite_paiement;
    }

    public function setDateLimitePaiement(\DateTimeInterface $date_limite_paiement): self
    {
        $this->date_limite_paiement = $date_limite_paiement;

        return $this;
    }

    public function getAbonne(): ?Abonne
    {
        return $this->abonne;
    }

    public function setAbonne(?Abonne $abonne): self
    {
        $this->abonne = $abonne;

        return $this;
    }
}
