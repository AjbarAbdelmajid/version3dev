<?php

namespace App\Entity;

use App\Repository\MinstayProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MinstayProduitRepository::class)
 */
class MinstayProduit
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
    private $date_minstay;

    /**
     * @ORM\Column(type="integer")
     */
    private $minstay;

    /**
     * @ORM\ManyToOne(targetEntity=ProduitThalasso::class, inversedBy="minstay_produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit_thalasso;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMinstay(): ?\DateTimeInterface
    {
        return $this->date_minstay;
    }

    public function setDateMinstay(?\DateTimeInterface $date_minstay): self
    {
        $this->date_minstay = $date_minstay;

        return $this;
    }

    public function getMinstay(): ?int
    {
        return $this->minstay;
    }

    public function setMinstay(int $minstay): self
    {
        $this->minstay = $minstay;

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
