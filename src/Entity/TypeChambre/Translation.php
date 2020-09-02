<?php
namespace App\Entity\TypeChambre;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslation;
/**
 * @ORM\Entity
 * @ORM\Table(name="type_chambre_translation",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="type_chambre_translationn_idx", columns={
 *         "locale", "object_id", "field"
 *     })}
 * )
 */
class Translation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeChambre", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}
