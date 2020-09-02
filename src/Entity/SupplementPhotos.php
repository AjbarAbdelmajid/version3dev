<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use App\Repository\SupplementPhotosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplementPhotosRepository::class)
 */
class SupplementPhotos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Media::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sonata_image;

    /**
     * @ORM\ManyToOne(targetEntity=Supplement::class, inversedBy="supplement_photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $supplement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSonataImage(): ?Media
    {
        return $this->sonata_image;
    }

    public function setSonataImage(Media $sonata_image): self
    {
        $this->sonata_image = $sonata_image;

        return $this;
    }

    public function getSupplement(): ?Supplement
    {
        return $this->supplement;
    }

    public function setSupplement(?Supplement $supplement): self
    {
        $this->supplement = $supplement;

        return $this;
    }
}
