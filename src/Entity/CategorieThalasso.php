<?php

namespace App\Entity;

use App\Repository\CategorieThalassoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Supplement\Translation;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * @ORM\Entity(repositoryClass=CategorieThalassoRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\CategorieThalassos\Translation")
 */
class CategorieThalasso extends AbstractPersonalTranslatable implements TranslatableInterface
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
    private $nom_categorie_thalasso;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\CategorieThalassos\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @ORM\OneToMany(targetEntity=ProduitThalasso::class, mappedBy="categorie_thalasso")
     */
    private $produit_thalassos;

    public function __construct()
    {
        parent::__construct();
        $this->produit_thalassos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorieThalasso(): ?string
    {
        return $this->nom_categorie_thalasso;
    }

    public function setNomCategorieThalasso(string $nom_categorie_thalasso): self
    {
        $this->nom_categorie_thalasso = $nom_categorie_thalasso;

        return $this;
    }
    /**
     * Remove translation.
     *
     * @param \App\Entity\CategorieThalassos\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\CategorieThalassos\Translation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    /**
     * @return Collection|ProduitThalasso[]
     */
    public function getProduitThalassos(): Collection
    {
        return $this->produit_thalassos;
    }

    public function addProduitThalasso(ProduitThalasso $produitThalasso): self
    {
        if (!$this->produit_thalassos->contains($produitThalasso)) {
            $this->produit_thalassos[] = $produitThalasso;
            $produitThalasso->setCategorieThalasso($this);
        }

        return $this;
    }

    public function removeProduitThalasso(ProduitThalasso $produitThalasso): self
    {
        if ($this->produit_thalassos->contains($produitThalasso)) {
            $this->produit_thalassos->removeElement($produitThalasso);
            // set the owning side to null (unless already changed)
            if ($produitThalasso->getCategorieThalasso() === $this) {
                $produitThalasso->setCategorieThalasso(null);
            }
        }

        return $this;
    }
}
