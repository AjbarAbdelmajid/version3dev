<?php

namespace App\Entity;

use App\Repository\MaxstayChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="maxstay_chambre")
 * @ORM\Entity(repositoryClass=MaxstayChambreRepository::class)
 */
class MaxstayChambre
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
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="maxstay_chambre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $chambre;

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
