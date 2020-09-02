<?php
namespace App\Admin;

use App\Entity\TypeLit;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;


final class TypeLitAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMApper)
    {
        $formMApper
            ->add('nom_type_lit', TextType::Class, [
                'label' => 'Type de lit',
                'required' => true,

            ]);
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom_type_lit');
        
    }
    Protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper ->addIdentifier('nom_type_lit', null, [
            'label' => 'Type de lit',
        ])
        ->add('_action', null, [
            'actions' => [
                'edit' => array(),
            ]
        ])
        ;
    }
}