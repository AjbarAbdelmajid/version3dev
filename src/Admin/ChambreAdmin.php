<?php

namespace App\Admin;

use App\Entity\TypeChambre;
use App\Entity\TypeLit;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Sonata\Form\Type\DateTimePickerType;




final class ChambreAdmin extends AbstractAdmin
{
   
    protected function configureFormFields(FormMapper $formMApper)
    {
        $formMApper
            ->add('nom_chambre', TextType::Class, [
                'label' => 'Nom de la chambre',
                'required' => true,
            ])
            ->add('type_chambre' , ModelType::class , [
                'label' => 'Type de la chambre' ,
                'class' => TypeChambre::class,
                'required'=> true ,
                'property' => 'nom_type_chambre',
                'multiple' => false
            ])
            ->add('nbr_adultes', IntegerType::Class, [
                'label' => 'Adultes',
                'required' => true,
                'attr'     => array(
                    'min'  => 1,
                    'step' => 1,
                ),    
            ])
            ->add('nbr_enfants', IntegerType::Class, [
                'label' => 'Enfants',
                'required' => true,
                'attr'     => array(
                    'min'  => 0,
                    'step' => 1,
                ), 
            ])
            ->add('typeLits', EntityType::class , array(
                'label'=> 'Type Lit',
                'class' => TypeLit::class,
                'expanded' => true,
                'multiple' => true,
                'choice_attr' => function($val, $key, $index) {
                    return array('required' => true);
                },
            ))
            ->add('vendable_bon_cadeau', ChoiceType::Class, array(
                'choices' => array( 'Non'=>false,'Oui'=>true),
                'expanded' => 1,
                'choice_value' => 'Non',
                'multiple' => 0,
            ))

            ->add('accroche', CKEditorType::class, [
                'label' => 'Accroche',
                'required' => true,
                'auto_inline' => false
                ])
            ->add('description', CKEditorType::class, [
                'label' => 'Description',
                'required' => true,
                'auto_inline' => false
                ])
            ->add('chambrePhotos' , CollectionType::class ,  [
                // Prevents the "Delete" option from being displayed
                'type_options' => ['delete' => true]

            ], [
                'edit' => 'inline',
                'inline' => 'table',
                
            ] )
            ;
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom_chambre', null, [
                'label' => 'Nom de la chambre',
            ])
            ->add('actif');
        
    }
    Protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper ->addIdentifier('nom_chambre', null, [
            'label' => 'Nom de la chambre',
        ])
        ->add('actif', null, [
            'editable' => true
        ])
        ->add('_action', null, [
            'actions' => [
                'edit' => array(),
            ]
        ])
        ;
    }

}