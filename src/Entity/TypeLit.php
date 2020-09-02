<?php

namespace App\Entity;

use App\Entity\TypeLit\Translation;
use App\Repository\TypeLitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * TypeLit
 * 
 * @ORM\Table(name="type_lit")
 * @ORM\Entity(repositoryClass=TypeLitRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\TypeLit\Translation")
 */
class TypeLit extends AbstractPersonalTranslatable implements TranslatableInterface
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
    private $nom_type_lit;
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\TypeLit\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    /**
     * @ORM\ManyToMany(targetEntity=Chambre::class, inversedBy="typeLits")
     */
    private $chambres;

    public function __construct()
    {
        $this->chambres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeLit(): ?string
    {
        return $this->nom_type_lit;
    }

    public function setNomTypeLit(string $nom_type_lit): self
    {
        $this->nom_type_lit = $nom_type_lit;

        return $this;
    }
    
    /**
     * Remove translation.
     *
     * @param \App\Entity\TypeLit\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\TypeLit\Translation $translation)
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
        }

        return $this;
    }
    public function __toString()
    {
        $titre="Type lit";
        if($this->nom_type_lit!="") $titre=$this->nom_type_lit;
        return $titre;
    }
    public function removeChambre(Chambre $chambre): self
    {
        if ($this->chambres->contains($chambre)) {
            $this->chambres->removeElement($chambre);
        }

        return $this;
    }
}
