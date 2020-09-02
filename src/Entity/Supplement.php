<?php

namespace App\Entity;

use App\Repository\SupplementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Supplement\Translation;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * @ORM\Entity(repositoryClass=SupplementRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\Supplement\Translation")
 */
class Supplement extends AbstractPersonalTranslatable implements TranslatableInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=300)
     */
    private $nom_supplement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gestion_dispo;

    /**
     * @ORM\ManyToMany(targetEntity=Chambre::class, inversedBy="supplements")
     * @ORM\JoinTable(
        *     name="chambre_supplement",
        *     joinColumns={@ORM\JoinColumn(name="supplement_id", referencedColumnName="id" )},
        *     inverseJoinColumns={@ORM\JoinColumn(name="chambre_id", referencedColumnName="id" )}
        *    )
     */
    private $chambres;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Supplement\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @ORM\OneToMany(targetEntity=SupplementPhotos::class, mappedBy="supplement", cascade={"persist", "remove"})
     */
    private $supplement_photos;

    /**
     * @ORM\ManyToMany(targetEntity=TypeFacturation::class, mappedBy="supplement")
     * @ORM\JoinTable(
     *     name="supplement_type_facturation" )
     */
    private $type_facturations;

    public function __construct()
    {
        $this->chambres = new ArrayCollection();
        $this->supplement_photos = new ArrayCollection();
        $this->type_facturations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSupplement(): ?string
    {
        return $this->nom_supplement;
    }

    public function setNomSupplement(string $nom_supplement): self
    {
        $this->nom_supplement = $nom_supplement;

        return $this;
    }

    public function getGestionDispo(): ?bool
    {
        return $this->gestion_dispo;
    }

    public function setGestionDispo(bool $gestion_dispo): self
    {
        $this->gestion_dispo = $gestion_dispo;

        return $this;
    }

    /**
     * @return Collection|Chambre[]
     */
    public function getChambres(): Collection
    {
        return $this->chambres;
    }

    public function addChambre(Chambre $chambre): self
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres[] = $chambre;
        }

        return $this;
    }

    public function removeChambre(Chambre $chambre): self
    {
        if ($this->chambres->contains($chambre)) {
            $this->chambres->removeElement($chambre);
        }

        return $this;
    }
    /**
     * @return Collection|supplement_photos[]
     */
    public function getSupplementPhotos(): Collection
    {
        return $this->supplement_photos;
    }

    public function addSupplementPhoto(SupplementPhotos $supplementPhoto): self
    {
        if (!$this->supplement_photos->contains($supplementPhoto)) {
            $this->supplement_photos[] = $supplementPhoto;
            $supplementPhoto->setSupplement($this);
        }

        return $this;
    }

    public function removeSupplementPhoto(SupplementPhotos $supplementPhoto): self
    {
        if ($this->supplement_photos->contains($supplementPhoto)) {
            $this->supplement_photos->removeElement($supplementPhoto);
            // set the owning side to null (unless already changed)
            if ($supplementPhoto->getSupplement() === $this) {
                $supplementPhoto->setSupplement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TypeFacturation[]
     */
    public function getTypeFacturations(): Collection
    {
        return $this->type_facturations;
    }

    public function addTypeFacturation(TypeFacturation $typeFacturation): self
    {
        if (!$this->type_facturations->contains($typeFacturation)) {
            $this->type_facturations[] = $typeFacturation;
            $typeFacturation->addSupplement($this);
        }

        return $this;
    }

    public function removeTypeFacturation(TypeFacturation $typeFacturation): self
    {
        if ($this->type_facturations->contains($typeFacturation)) {
            $this->type_facturations->removeElement($typeFacturation);
            $typeFacturation->removeSupplement($this);
        }

        return $this;
    }
    /**
     * Remove translation.
     *
     * @param \App\Entity\Supplement\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\Supplement\Translation $translation)
    {
        return $this->translations->removeElement($translation);
    }
}
