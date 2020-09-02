<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\Chambre\Translation")
 */
class Tag  extends AbstractPersonalTranslatable implements TranslatableInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=255)
     */
    private $nom_jour;

    /**
     * @ORM\Column(type="integer")
     */
    private $val_jour;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Tags\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieTag::class, inversedBy="tags")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie_tag;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Remove translation.
     *
     * @param \App\Entity\Tags\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\Tags\Translation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    public function getNomJour(): ?string
    {
        return $this->nom_jour;
    }

    public function setNomJour(string $nom_jour): self
    {
        $this->nom_jour = $nom_jour;

        return $this;
    }

    public function getValJour(): ?int
    {
        return $this->val_jour;
    }

    public function setValJour(int $val_jour): self
    {
        $this->val_jour = $val_jour;

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

    public function getCategorieTag(): ?CategorieTag
    {
        return $this->categorie_tag;
    }

    public function setCategorieTag(?CategorieTag $categorie_tag): self
    {
        $this->categorie_tag = $categorie_tag;

        return $this;
    }
}
