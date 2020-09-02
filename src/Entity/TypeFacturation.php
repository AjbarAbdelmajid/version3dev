<?php

namespace App\Entity;

use App\Repository\TypeFacturationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Supplement\Translation;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * @ORM\Entity(repositoryClass=TypeFacturationRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\TypeFacturation\Translation")
 */
class TypeFacturation  extends AbstractPersonalTranslatable implements TranslatableInterface
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
    private $nom_type_facturation;

    /**
     * @ORM\ManyToMany(targetEntity=Supplement::class, inversedBy="type_facturations")
     * @ORM\JoinTable(
     *     name="supplement_type_facturation"
     *    )
     */
    private $supplement;

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

    public function __construct()
    {
        $this->supplement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeFacturation(): ?string
    {
        return $this->nom_type_facturation;
    }

    public function setNomTypeFacturation(string $nom_type_facturation): self
    {
        $this->nom_type_facturation = $nom_type_facturation;

        return $this;
    }

    /**
     * @return Collection|Supplement[]
     */
    public function getSupplement(): Collection
    {
        return $this->supplement;
    }

    public function addSupplement(Supplement $supplement): self
    {
        if (!$this->supplement->contains($supplement)) {
            $this->supplement[] = $supplement;
        }

        return $this;
    }

    public function removeSupplement(Supplement $supplement): self
    {
        if ($this->supplement->contains($supplement)) {
            $this->supplement->removeElement($supplement);
        }

        return $this;
    }
    /**
     * Remove translation.
     *
     * @param \App\Entity\TypeFacturation\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\TypeFacturation\Translation $translation)
    {
        return $this->translations->removeElement($translation);
    }
}
