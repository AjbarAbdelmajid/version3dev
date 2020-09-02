<?php

namespace App\Entity;

use App\Entity\Chambre;
use App\Repository\TypeChambreRepository;
use App\Entity\TypeChambre\Translation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;


/**
 * TypeChambre
 * 
 * @ORM\Table(name="type_chambre")
 * @ORM\Entity(repositoryClass=TypeChambreRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\TypeChambre\Translation")
 */
class TypeChambre extends AbstractPersonalTranslatable implements TranslatableInterface
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
    private $nom_type_chambre;

    /**
     * @ORM\Column(type="boolean", options={"default" : 1})
     */
    private $actif = true;

    /**
     *  @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime" , nullable=true)
     */
    private $updated_at;
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\TypeChambre\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    /**
     * @ORM\OneToMany(targetEntity=Chambre::class, mappedBy="type_chambre", cascade={"persist"})
     */
    private $chambres;

    public function __construct()
    {
        parent::__construct();
        $this->chambres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeChambre(): ?string
    {
        return $this->nom_type_chambre;
    }

    public function setNomTypeChambre(string $nom_type_chambre): self
    {
        $this->nom_type_chambre = $nom_type_chambre;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }
    /**
     * Get created_at.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }
    /**
     * Set created_at.
     *
     * @param \DateTime|null $created_at
     *
     * @return TypeChambre
     */
    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    /**
     * Get updated_at.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    /**
     * Set updated_at.
     *
     * @param \DateTime|null $updated_at
     *
     * @return TypeChambre
     */
    public function setUpdatedAt(\DateTimeInterface $updated_at = null): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function __toString()
    {
        $titre="Type chambre";
        if($this->nom_type_chambre!="") $titre=$this->nom_type_chambre;
        return $titre;
    }
    
    /**
     * Remove translation.
     *
     * @param \App\Entity\TypeChambre\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\TypeChambre\Translation $translation)
    {
        return $this->translations->removeElement($translation);
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
            $chambre->setTypeChambre($this);
        }

        return $this;
    }

    public function removeChambre(Chambre $chambre): self
    {
        if ($this->chambres->contains($chambre)) {
            $this->chambres->removeElement($chambre);
            // set the owning side to null (unless already changed)
            if ($chambre->getTypeChambre() === $this) {
                $chambre->setTypeChambre(null);
            }
        }

        return $this;
    }
}
