<?php

namespace App\Entity;

use App\Repository\ProduitThalassoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Supplement\Translation;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
/**
 * @ORM\Entity(repositoryClass=ProduitThalassoRepository::class)
 * @Gedmo\TranslationEntity(class="\App\Entity\ProduitThalassos\Translation")
 */
class ProduitThalasso extends AbstractPersonalTranslatable implements TranslatableInterface
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
    private $nom_produit_thalasso;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $date_arrivee_exigee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree_minute;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree_heure;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree_jours;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree_nuitee;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_participants_min;

    /**
     * @ORM\Column(type="string", length=255, columnDefinition="enum('avec', 'sans', 'avec_sans_hebergement')")
     */
    private $hebergement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vendable_bon_cadeau;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="text")
     */
    private $accroche;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieThalasso::class, inversedBy="produit_thalassos")
     */
    private $categorie_thalasso;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\ProduitThalassos\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @ORM\ManyToMany(targetEntity=ProduitThalasso::class, inversedBy="produitThalassos")
     */
    private $produit_thalasso_liee;

    /**
     * @ORM\ManyToMany(targetEntity=ProduitThalasso::class, mappedBy="produit_thalasso_liee")
     */
    private $produitThalassos;

    /**
     * @ORM\OneToMany(targetEntity=ProduitThalassoPhotos::class, mappedBy="produit_thalasso", cascade={"persist", "remove"})
     */
    private $produitThalassoPhotos;

    /**
     * @ORM\OneToMany(targetEntity=MaxstayProduit::class, mappedBy="produit_thalasso", cascade={"persist", "remove"})
     */
    private $maxstay_produits;

    /**
     * @ORM\OneToMany(targetEntity=DispoProduit::class, mappedBy="produit_thalasso", cascade={"persist", "remove"})
     */
    private $dispo_produits;

    /**
     * @ORM\OneToMany(targetEntity=MinstayProduit::class, mappedBy="produit_thalasso", cascade={"persist", "remove"})
     */
    private $minstay_produits;

    /**
     * @ORM\ManyToMany(targetEntity=JourSemaine::class, mappedBy="produit_thalassos")
     */
    private $jour_semaines;

    /**
     * @ORM\ManyToMany(targetEntity=Chambre::class, inversedBy="chambre_soins_carte")
     * @ORM\JoinTable(
        *     name="chambre_soins_carte"
        *    )
     */
    private $produit_thalasso_chambres;

    /**
     * @ORM\ManyToMany(targetEntity=Chambre::class, inversedBy="produit_thalasso")
     * @ORM\JoinTable(
        *     name="produit_thalasso_chambres"
        *    )
     */
    private $chambres;

    public function __construct()
    {
        parent::__construct();
        $this->produit_thalasso_liee = new ArrayCollection();
        $this->produitThalassos = new ArrayCollection();
        $this->produitThalassoPhotos = new ArrayCollection();
        $this->maxstay_produits = new ArrayCollection();
        $this->dispo_produits = new ArrayCollection();
        $this->minstay_produits = new ArrayCollection();
        $this->jour_semaines = new ArrayCollection();
        $this->chambre_soins_carte = new ArrayCollection();
        $this->chambres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduitThalasso(): ?string
    {
        return $this->nom_produit_thalasso;
    }

    public function setNomProduitThalasso(string $nom_produit_thalasso): self
    {
        $this->nom_produit_thalasso = $nom_produit_thalasso;

        return $this;
    }

    public function getDateArriveeExigee(): ?int
    {
        return $this->date_arrivee_exigee;
    }

    public function setDateArriveeExigee(?int $date_arrivee_exigee): self
    {
        $this->date_arrivee_exigee = $date_arrivee_exigee;

        return $this;
    }

    public function getDureeMinute(): ?int
    {
        return $this->duree_minute;
    }

    public function setDureeMinute(?int $duree_minute): self
    {
        $this->duree_minute = $duree_minute;

        return $this;
    }

    public function getDureeHeure(): ?int
    {
        return $this->duree_heure;
    }

    public function setDureeHeure(?int $duree_heure): self
    {
        $this->duree_heure = $duree_heure;

        return $this;
    }

    public function getDureeJours(): ?int
    {
        return $this->duree_jours;
    }

    public function setDureeJours(?int $duree_jours): self
    {
        $this->duree_jours = $duree_jours;

        return $this;
    }

    public function getDureeNuitee(): ?int
    {
        return $this->duree_nuitee;
    }

    public function setDureeNuitee(?int $duree_nuitee): self
    {
        $this->duree_nuitee = $duree_nuitee;

        return $this;
    }

    public function getNbrParticipantsMin(): ?int
    {
        return $this->nbr_participants_min;
    }

    public function setNbrParticipantsMin(int $nbr_participants_min): self
    {
        $this->nbr_participants_min = $nbr_participants_min;

        return $this;
    }

    public function getHebergement(): ?string
    {
        return $this->hebergement;
    }

    public function setHebergement(string $hebergement): self
    {
        $this->hebergement = $hebergement;

        return $this;
    }

    public function getVendableBonCadeau(): ?bool
    {
        return $this->vendable_bon_cadeau;
    }

    public function setVendableBonCadeau(bool $vendable_bon_cadeau): self
    {
        $this->vendable_bon_cadeau = $vendable_bon_cadeau;

        return $this;
    }

    public function getAccroche(): ?string
    {
        return $this->accroche;
    }

    public function setAccroche(string $accroche): self
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

    public function getCategorieThalasso(): ?CategorieThalasso
    {
        return $this->categorie_thalasso;
    }

    public function setCategorieThalasso(?CategorieThalasso $categorie_thalasso): self
    {
        $this->categorie_thalasso = $categorie_thalasso;

        return $this;
    }

    /**
     * Remove translation.
     *
     * @param \App\Entity\ProduitThalassos\Translation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\App\Entity\ProduitThalassos\Translation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    /**
     * @return Collection|self[]
     */
    public function getProduitThalassoLiee(): Collection
    {
        return $this->produit_thalasso_liee;
    }

    public function addProduitThalassoLiee(self $produitThalassoLiee): self
    {
        if (!$this->produit_thalasso_liee->contains($produitThalassoLiee)) {
            $this->produit_thalasso_liee[] = $produitThalassoLiee;
        }

        return $this;
    }

    public function removeProduitThalassoLiee(self $produitThalassoLiee): self
    {
        if ($this->produit_thalasso_liee->contains($produitThalassoLiee)) {
            $this->produit_thalasso_liee->removeElement($produitThalassoLiee);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getProduitThalassos(): Collection
    {
        return $this->produitThalassos;
    }

    public function addProduitThalasso(self $produitThalasso): self
    {
        if (!$this->produitThalassos->contains($produitThalasso)) {
            $this->produitThalassos[] = $produitThalasso;
            $produitThalasso->addProduitThalassoLiee($this);
        }

        return $this;
    }

    public function removeProduitThalasso(self $produitThalasso): self
    {
        if ($this->produitThalassos->contains($produitThalasso)) {
            $this->produitThalassos->removeElement($produitThalasso);
            $produitThalasso->removeProduitThalassoLiee($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProduitThalassoPhotos[]
     */
    public function getProduitThalassoPhotos(): Collection
    {
        return $this->produitThalassoPhotos;
    }

    public function addProduitThalassoPhoto(ProduitThalassoPhotos $produitThalassoPhoto): self
    {
        if (!$this->produitThalassoPhotos->contains($produitThalassoPhoto)) {
            $this->produitThalassoPhotos[] = $produitThalassoPhoto;
            $produitThalassoPhoto->setProduitThalasso($this);
        }

        return $this;
    }

    public function removeProduitThalassoPhoto(ProduitThalassoPhotos $produitThalassoPhoto): self
    {
        if ($this->produitThalassoPhotos->contains($produitThalassoPhoto)) {
            $this->produitThalassoPhotos->removeElement($produitThalassoPhoto);
            // set the owning side to null (unless already changed)
            if ($produitThalassoPhoto->getProduitThalasso() === $this) {
                $produitThalassoPhoto->setProduitThalasso(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MaxstayProduit[]
     */
    public function getMaxstayProduits(): Collection
    {
        return $this->maxstay_produits;
    }

    public function addMaxstayProduit(MaxstayProduit $maxstayProduit): self
    {
        if (!$this->maxstay_produits->contains($maxstayProduit)) {
            $this->maxstay_produits[] = $maxstayProduit;
            $maxstayProduit->setProduitThalasso($this);
        }

        return $this;
    }

    public function removeMaxstayProduit(MaxstayProduit $maxstayProduit): self
    {
        if ($this->maxstay_produits->contains($maxstayProduit)) {
            $this->maxstay_produits->removeElement($maxstayProduit);
            // set the owning side to null (unless already changed)
            if ($maxstayProduit->getProduitThalasso() === $this) {
                $maxstayProduit->setProduitThalasso(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DispoProduit[]
     */
    public function getDispoProduits(): Collection
    {
        return $this->dispo_produits;
    }

    public function addDispoProduit(DispoProduit $dispoProduit): self
    {
        if (!$this->dispo_produits->contains($dispoProduit)) {
            $this->dispo_produits[] = $dispoProduit;
            $dispoProduit->setProduitThalasso($this);
        }

        return $this;
    }

    public function removeDispoProduit(DispoProduit $dispoProduit): self
    {
        if ($this->dispo_produits->contains($dispoProduit)) {
            $this->dispo_produits->removeElement($dispoProduit);
            // set the owning side to null (unless already changed)
            if ($dispoProduit->getProduitThalasso() === $this) {
                $dispoProduit->setProduitThalasso(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MinstayProduit[]
     */
    public function getMinstayProduits(): Collection
    {
        return $this->minstay_produits;
    }

    public function addMinstayProduit(MinstayProduit $minstayProduit): self
    {
        if (!$this->minstay_produits->contains($minstayProduit)) {
            $this->minstay_produits[] = $minstayProduit;
            $minstayProduit->setProduitThalasso($this);
        }

        return $this;
    }

    public function removeMinstayProduit(MinstayProduit $minstayProduit): self
    {
        if ($this->minstay_produits->contains($minstayProduit)) {
            $this->minstay_produits->removeElement($minstayProduit);
            // set the owning side to null (unless already changed)
            if ($minstayProduit->getProduitThalasso() === $this) {
                $minstayProduit->setProduitThalasso(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JourSemaine[]
     */
    public function getJourSemaines(): Collection
    {
        return $this->jour_semaines;
    }

    public function addJourSemaine(JourSemaine $jourSemaine): self
    {
        if (!$this->jour_semaines->contains($jourSemaine)) {
            $this->jour_semaines[] = $jourSemaine;
            $jourSemaine->addProduitThalasso($this);
        }

        return $this;
    }

    public function removeJourSemaine(JourSemaine $jourSemaine): self
    {
        if ($this->jour_semaines->contains($jourSemaine)) {
            $this->jour_semaines->removeElement($jourSemaine);
            $jourSemaine->removeProduitThalasso($this);
        }

        return $this;
    }

    /**
     * @return Collection|Chambre[]
     */
    public function getChambreSoinsCarte(): Collection
    {
        return $this->chambre_soins_carte;
    }

    public function addChambreSoinsCarte(Chambre $chambreSoinsCarte): self
    {
        if (!$this->chambre_soins_carte->contains($chambreSoinsCarte)) {
            $this->chambre_soins_carte[] = $chambreSoinsCarte;
        }

        return $this;
    }

    public function removeChambreSoinsCarte(Chambre $chambreSoinsCarte): self
    {
        if ($this->chambre_soins_carte->contains($chambreSoinsCarte)) {
            $this->chambre_soins_carte->removeElement($chambreSoinsCarte);
        }

        return $this;
    }

    /**
     * @return Collection|Chambre[]
     */
    public function getChambre(): Collection
    {
        return $this->chambres;
    }

    public function addChambre(Chambre $chambres): self
    {
        if (!$this->chambres->contains($chambres)) {
            $this->chambres[] = $chambres;
            $chambres->addChambre($this);
        }

        return $this;
    }

    public function removeChambre(Chambre $chambres): self
    {
        if ($this->chambres->contains($chambres)) {
            $this->chambres->removeElement($chambres);
            $chambres->removeChambre($this);
        }

        return $this;
    }
}
