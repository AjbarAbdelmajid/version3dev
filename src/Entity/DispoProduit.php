<?php

namespace App\Entity;

use App\Repository\DispoProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DispoProduitRepository::class)
 */
class DispoProduit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_dispo;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock_dispo;

    /**
     * @ORM\ManyToOne(targetEntity=ProduitThalasso::class, inversedBy="dispo_produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit_thalasso;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDispo(): ?\DateTimeInterface
    {
        return $this->date_dispo;
    }

    public function setDateDispo(?\DateTimeInterface $date_dispo): self
    {
        $this->date_dispo = $date_dispo;

        return $this;
    }

    public function getStockDispo(): ?int
    {
        return $this->stock_dispo;
    }

    public function setStockDispo(int $stock_dispo): self
    {
        $this->stock_dispo = $stock_dispo;

        return $this;
    }

    public function getProduitThalasso(): ?ProduitThalasso
    {
        return $this->produit_thalasso;
    }

    public function setProduitThalasso(?ProduitThalasso $produit_thalasso): self
    {
        $this->produit_thalasso = $produit_thalasso;

        return $this;
    }
}
