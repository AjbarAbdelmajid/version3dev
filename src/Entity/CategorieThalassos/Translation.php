<?php
namespace App\Entity\CategorieThalassos;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslation;
/**
 * @ORM\Entity
 * @ORM\Table(name="Categorie_thalasso_translation",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="Categorie_thalasso_translationn_idx", columns={
 *         "locale", "object_id", "field"
 *     })}
 * )
 */
class Translation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategorieThalasso", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}
