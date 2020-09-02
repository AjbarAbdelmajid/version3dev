<?php

namespace App\Entity;

use App\Repository\CategorieTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * @ORM\Entity(repositoryClass=CategorieTagRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\CategoriesTags\Translation")
 */
class CategorieTag extends AbstractPersonalTranslatable implements TranslatableInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_categorie_tag;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\CategoriesTags\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @ORM\OneToMany(targetEntity=Tag::class, mappedBy="categorie_tag", cascade={"persist", "remove"})
     */
    private $tags;

    public function __construct()
    {
        parent::__construct();
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorieTag(): ?string
    {
        return $this->nom_categories_tag;
    }

    public function setNomCategorieTag(string $nom_categorie_tag): self
    {
        $this->nom_categorie_tag = $nom_categorie_tag;

        return $this;
    }

    /**
     * Remove translation.
     *
     * @param \App\Entity\Chambre\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\Chambre\Translation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->setCategorieTag($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            // set the owning side to null (unless already changed)
            if ($tag->getCategorieTag() === $this) {
                $tag->setCategorieTag(null);
            }
        }

        return $this;
    }
}
