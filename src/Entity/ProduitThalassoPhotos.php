<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use App\Repository\ProduitThalassoPhotosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitThalassoPhotosRepository::class)
 */
class ProduitThalassoPhotos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ProduitThalasso::class, inversedBy="produitThalassoPhotos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit_thalasso;

    /**
     * @ORM\OneToOne(targetEntity=Media::class, cascade={"persist", "remove"})
     */
    private $sonata_image;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSonataImage(): ?Media
    {
        return $this->sonata_image;
    }

    public function setSonataImage(?Media $sonata_image): self
    {
        $this->sonata_image = $sonata_image;

        return $this;
    }
}
