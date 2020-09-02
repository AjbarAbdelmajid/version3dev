<?php

namespace App\Entity;

use App\Repository\JourSemaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JourSemaineRepository::class)
 */
class JourSemaine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_jour;

    /**
     * @ORM\Column(type="integer")
     */
    private $val_jour;

    /**
     * @ORM\ManyToMany(targetEntity=ProduitThalasso::class, inversedBy="jour_semaines")
     */
    private $produit_thalassos;

    public function __construct()
    {
        $this->produit_thalassos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomJour(): ?string
    {
        return $this->nom_jour;
    }

    public function setNomJour(string $nom_jour): self
    {
        $this->nom_jour = $nom_jour;

        return $this;
    }

    public function getValJour(): ?int
    {
        return $this->val_jour;
    }

    public function setValJour(int $val_jour): self
    {
        $this->val_jour = $val_jour;

        return $this;
    }

    /**
     * @return Collection|ProduitThalasso[]
     */
    public function getProduitThalassos(): Collection
    {
        return $this->produit_thalassos;
    }

    public function addProduitThalasso(ProduitThalasso $produitThalasso): self
    {
        if (!$this->produit_thalassos->contains($produitThalasso)) {
            $this->produit_thalassos[] = $produitThalasso;
        }

        return $this;
    }

    public function removeProduitThalasso(ProduitThalasso $produitThalasso): self
    {
        if ($this->produit_thalassos->contains($produitThalasso)) {
            $this->produit_thalassos->removeElement($produitThalasso);
        }

        return $this;
    }
}
