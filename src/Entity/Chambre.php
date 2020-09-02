<?php

namespace App\Entity;

use App\Entity\Chambre\Translation;
use App\Entity\TypeChambre;
use App\Repository\ChambreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * Chambre
 * 
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\Chambre\Translation")
 */
class Chambre  extends AbstractPersonalTranslatable implements TranslatableInterface
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
    private $nom_chambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_adultes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbr_enfants;

    /**
     * @ORM\Column(type="boolean", options={"default" : 1})
     */
    private $vendable_bon_cadeau;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="text", nullable=true)
     */
    private $accroche;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", options={"default" : 1})
     */
    private $actif;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=TypeChambre::class, inversedBy="chambres", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $type_chambre;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Chambre\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @ORM\OneToMany(targetEntity=ChambrePhotos::class, mappedBy="chambre", cascade={"persist", "remove"})
     */
    private $chambrePhotos;

    /**
     * @ORM\ManyToMany(targetEntity=TypeLit::class, mappedBy="chambres")
     */
    private $typeLits;

    /**
     * @ORM\OneToMany(targetEntity=DispoChambre::class, mappedBy="chambre", cascade={"persist", "remove"})
     */
    private $dispo_chambre;

    /**
     * @ORM\OneToMany(targetEntity=MinstayChambre::class, mappedBy="chambre", cascade={"persist", "remove"})
     */
    private $minstay_chambre;

    /**
     * @ORM\OneToMany(targetEntity=MaxstayChambre::class, mappedBy="chambre", cascade={"persist", "remove"})
     */
    private $maxstay_chambre;

    /**
     * @ORM\ManyToMany(targetEntity=Chambre::class, inversedBy="proposedby")
     * @ORM\JoinTable(
        *     name="chambre_propositions",
        *     joinColumns={@ORM\JoinColumn(name="chambre_id", referencedColumnName="id" )},
        *     inverseJoinColumns={@ORM\JoinColumn(name="chambre_propose_id", referencedColumnName="id" )}
        *
        *    )
     */
    private $chambre_propositions;

    /**
     * @ORM\ManyToMany(targetEntity=Chambre::class, mappedBy="chambre_propositions")
     * @ORM\JoinTable(
     *     name="chambre_propositions" )
     */
    private $proposedby;

    /**
     * @ORM\ManyToMany(targetEntity=Supplement::class, mappedBy="chambres")
     * @ORM\JoinTable(
     *     name="chambre_supplement" )
     */
    private $supplements;

    /**
     * @ORM\ManyToMany(targetEntity=ProduitThalasso::class, mappedBy="chambre_soins_carte")
     * @ORM\JoinTable(
        *     name="chambre_soins_carte"
        *    )
     */
    private $chambre_soins_carte;

    /**
     * @ORM\ManyToMany(targetEntity=ProduitThalasso::class, mappedBy="chambres")
     * @ORM\JoinTable(
     *     name="produit_thalasso_chambres"
     *    )
     */
    private $produit_thalasso;

    public function __construct()
    {
        $this->chambrePhotos = new ArrayCollection();
        $this->typeLits = new ArrayCollection();
        $this->dispo_chambre = new ArrayCollection();
        $this->minstay_chambre = new ArrayCollection();
        $this->maxstay_chambre = new ArrayCollection();
        $this->chambre_propositions = new ArrayCollection();
        $this->proposedby = new ArrayCollection();
        $this->supplements = new ArrayCollection();
        $this->chambre_soins_carte = new ArrayCollection();
        $this->produit_thalasso = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChambre(): ?string
    {
        return $this->nom_chambre;
    }

    public function setNomChambre(string $nom_chambre): self
    {
        $this->nom_chambre = $nom_chambre;

        return $this;
    }

    public function getNbrAdultes(): ?int
    {
        return $this->nbr_adultes;
    }

    public function setNbrAdultes(int $nbr_adultes): self
    {
        $this->nbr_adultes = $nbr_adultes;

        return $this;
    }

    public function getNbrEnfants(): ?int
    {
        return $this->nbr_enfants;
    }

    public function setNbrEnfants(?int $nbr_enfants): self
    {
        $this->nbr_enfants = $nbr_enfants;

        return $this;
    }

    public function getVendableBonCadeau(): ?bool
    {
        return $this->vendable_bon_cadeau;
    }

    public function setVendableBonCadeau(bool $vendable_bon_cadeau = true): self
    {
        $this->vendable_bon_cadeau = $vendable_bon_cadeau;

        return $this;
    }

    public function getAccroche(): ?string
    {
        return $this->accroche;
    }

    public function setAccroche(?string $accroche): self
    {
        $this->accroche = $accroche;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif=true): self
    {
        $this->actif = $actif;

        return $this;
    }
    public function getTypeChambre(): ?TypeChambre
    {
        return $this->type_chambre;
    }

    public function setTypeChambre(?TypeChambre $type_chambre): self
    {
        $this->type_chambre = $type_chambre;

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
     * @return Chambre
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
     * @return Chambre
     */
    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

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
     * @return Collection|ChambrePhotos[]
     */
    public function getChambrePhotos(): Collection
    {
        return $this->chambrePhotos;
    }

    public function addChambrePhoto(ChambrePhotos $chambrePhoto): self
    {
        if (!$this->chambrePhotos->contains($chambrePhoto)) {
            $this->chambrePhotos[] = $chambrePhoto;
            $chambrePhoto->setChambre($this);
        }

        return $this;
    }

    public function removeChambrePhoto(ChambrePhotos $chambrePhoto): self
    {
        if ($this->chambrePhotos->contains($chambrePhoto)) {
            $this->chambrePhotos->removeElement($chambrePhoto);
            // set the owning side to null (unless already changed)
            if ($chambrePhoto->getChambre() === $this) {
                $chambrePhoto->setChambre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TypeLit[]
     */
    public function getTypeLits(): Collection
    {
        return $this->typeLits;
    }

    public function addTypeLit(TypeLit $typeLit): self
    {
        if (!$this->typeLits->contains($typeLit)) {
            $this->typeLits[] = $typeLit;
            $typeLit->addChambre($this);
        }

        return $this;
    }

    public function removeTypeLit(TypeLit $typeLit): self
    {
        if ($this->typeLits->contains($typeLit)) {
            $this->typeLits->removeElement($typeLit);
            $typeLit->removeChambre($this);
        }

        return $this;
    }

    /**
     * @return Collection|DispoChambre[]
     */
    public function getDispoChambre(): Collection
    {
        return $this->dispo_chambre;
    }

    public function addDispoChambre(DispoChambre $dispoChambre): self
    {
        if (!$this->dispo_chambre->contains($dispoChambre)) {
            $this->dispo_chambre[] = $dispoChambre;
            $dispoChambre->setChambre($this);
        }

        return $this;
    }

    public function removeDispoChambre(DispoChambre $dispoChambre): self
    {
        if ($this->dispo_chambre->contains($dispoChambre)) {
            $this->dispo_chambre->removeElement($dispoChambre);
            // set the owning side to null (unless already changed)
            if ($dispoChambre->getChambre() === $this) {
                $dispoChambre->setChambre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MinstayChambre[]
     */
    public function getMinstayChambre(): Collection
    {
        return $this->minstay_chambre;
    }

    public function addMinstayChambre(MinstayChambre $minstayChambre): self
    {
        if (!$this->minstay_chambre->contains($minstayChambre)) {
            $this->minstay_chambre[] = $minstayChambre;
            $minstayChambre->setChambre($this);
        }

        return $this;
    }

    public function removeMinstayChambre(MinstayChambre $minstayChambre): self
    {
        if ($this->minstay_chambre->contains($minstayChambre)) {
            $this->minstay_chambre->removeElement($minstayChambre);
            // set the owning side to null (unless already changed)
            if ($minstayChambre->getChambre() === $this) {
                $minstayChambre->setChambre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MaxstayChambre[]
     */
    public function getMaxstayChambre(): Collection
    {
        return $this->maxstay_chambre;
    }

    public function addMaxstayChambre(MaxstayChambre $maxstayChambre): self
    {
        if (!$this->maxstay_chambre->contains($maxstayChambre)) {
            $this->maxstay_chambre[] = $maxstayChambre;
            $maxstayChambre->setChambre($this);
        }

        return $this;
    }

    public function removeMaxstayChambre(MaxstayChambre $maxstayChambre): self
    {
        if ($this->maxstay_chambre->contains($maxstayChambre)) {
            $this->maxstay_chambre->removeElement($maxstayChambre);
            // set the owning side to null (unless already changed)
            if ($maxstayChambre->getChambre() === $this) {
                $maxstayChambre->setChambre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getChambrePropositions(): Collection
    {
        return $this->chambre_propositions;
    }

    public function addChambreProposition(self $chambreProposition): self
    {
        if (!$this->chambre_propositions->contains($chambreProposition)) {
            $this->chambre_propositions[] = $chambreProposition;
        }

        return $this;
    }

    public function removeChambreProposition(self $chambreProposition): self
    {
        if ($this->chambre_propositions->contains($chambreProposition)) {
            $this->chambre_propositions->removeElement($chambreProposition);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getProposedby(): Collection
    {
        return $this->proposedby;
    }

    public function addProposedby(self $proposedby): self
    {
        if (!$this->proposedby->contains($proposedby)) {
            $this->proposedby[] = $proposedby;
            $proposedby->addChambreProposition($this);
        }

        return $this;
    }

    public function removeProposedby(self $proposedby): self
    {
        if ($this->proposedby->contains($proposedby)) {
            $this->proposedby->removeElement($proposedby);
            $proposedby->removeChambreProposition($this);
        }

        return $this;
    }

    /**
     * @return Collection|Supplement[]
     */
    public function getSupplements(): Collection
    {
        return $this->supplements;
    }

    public function addSupplement(Supplement $supplement): self
    {
        if (!$this->supplements->contains($supplement)) {
            $this->supplements[] = $supplement;
            $supplement->addChambre($this);
        }

        return $this;
    }

    public function removeSupplement(Supplement $supplement): self
    {
        if ($this->supplements->contains($supplement)) {
            $this->supplements->removeElement($supplement);
            $supplement->removeChambre($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProduitThalasso[]
     */
    public function getChambreSoinsCarte(): Collection
    {
        return $this->chambre_soins_carte;
    }

    public function addChambreSoinsCarte(ProduitThalasso $chambreSoinsCarte): self
    {
        if (!$this->chambre_soins_carte->contains($chambreSoinsCarte)) {
            $this->chambre_soins_carte[] = $chambreSoinsCarte;
            $chambreSoinsCarte->addChambreSoinsCarte($this);
        }

        return $this;
    }

    public function removeChambreSoinsCarte(ProduitThalasso $chambreSoinsCarte): self
    {
        if ($this->chambre_soins_carte->contains($chambreSoinsCarte)) {
            $this->chambre_soins_carte->removeElement($chambreSoinsCarte);
            $chambreSoinsCarte->removeChambreSoinsCarte($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProduitThalasso[]
     */
    public function getProduitThalasso(): Collection
    {
        return $this->produit_thalasso;
    }

    public function addProduitThalasso(ProduitThalasso $produitThalasso): self
    {
        if (!$this->produit_thalasso->contains($produitThalasso)) {
            $this->produit_thalasso[] = $produitThalasso;
            $produitThalasso->addProduitThalassoChambre($this);
        }

        return $this;
    }

    public function removeProduitThalasso(ProduitThalasso $produitThalasso): self
    {
        if ($this->produit_thalasso->contains($produitThalasso)) {
            $this->produit_thalasso->removeElement($produitThalasso);
            $produitThalasso->removeProduitThalassoChambre($this);
        }

        return $this;
    }
}
