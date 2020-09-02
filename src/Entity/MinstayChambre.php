<?php

namespace App\Entity;

use App\Repository\MinstayChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="minstay_chambre")
 * @ORM\Entity(repositoryClass=MinstayChambreRepository::class)
 */
class MinstayChambre
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
    private $stock_dispo;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="minstay_chambre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $chambre;

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

    public function getStockDispo(): ?int
    {
        return $this->stock_dispo;
    }

    public function setStockDispo(int $stock_dispo): self
    {
        $this->stock_dispo = $stock_dispo;

        return $this;
    }

    public function getChambre(): ?Chambre
    {
        return $this->chambre;
    }

    public function setChambre(?Chambre $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }
}
