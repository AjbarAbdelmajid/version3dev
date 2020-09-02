<?php
namespace App\Admin;

use App\Entity\TypeChambre;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;


final class TypeChambreAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMApper)
    {
        $formMApper
            ->add('nom_type_chambre', TextType::Class, [
                'label' => 'Type de chambre',
                'required' => true,

            ]);
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom_type_chambre');
        
    }
    Protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper ->addIdentifier('nom_type_chambre', null, [
            'label' => 'Type de chambre',
        ])
        ->add('_action', null, [
            'actions' => [
                'edit' => array(),
            ]
        ])
        ;
    }
}