<?php
namespace App\Entity\TypeFacturation;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslation;
/**
 * @ORM\Entity
 * @ORM\Table(name="type_facturation_translation",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="type_facturation_translationn_idx", columns={
 *         "locale", "object_id", "field"
 *     })}
 * )
 */
class Translation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeFacturation", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}
