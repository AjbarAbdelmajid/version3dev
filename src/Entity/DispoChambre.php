<?php

namespace App\Entity;

use App\Repository\DispoChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="dispo_chambre")
 * @ORM\Entity(repositoryClass=DispoChambreRepository::class)
 */
class DispoChambre
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
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="dispo_chambre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $chambre;

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
