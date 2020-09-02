<?php

namespace App\Entity;

use App\Repository\MaxstayProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaxstayProduitRepository::class)
 */
class MaxstayProduit
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
    private $date_maxstay;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxstay;

    /**
     * @ORM\ManyToOne(targetEntity=ProduitThalasso::class, inversedBy="maxstay_produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit_thalasso;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMaxstay(): ?\DateTimeInterface
    {
        return $this->date_maxstay;
    }

    public function setDateMaxstay(?\DateTimeInterface $date_maxstay): self
    {
        $this->date_maxstay = $date_maxstay;

        return $this;
    }

    public function getMaxstay(): ?int
    {
        return $this->maxstay;
    }

    public function setMaxstay(int $maxstay): self
    {
        $this->maxstay = $maxstay;

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
