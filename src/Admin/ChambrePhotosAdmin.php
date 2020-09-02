<?php

namespace App\Admin;

use AppBundle\Entity\ChambrePhotos;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\MediaBundle\Form\Type\MediaType;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChambrePhotosAdmin extends AbstractAdmin
{

            protected function configureRoutes(RouteCollection $collection)
    {
        
        $collection->remove('export');
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
//        $datagridMapper
//
//        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('chambre.nom_chambre', null , ["label" => "Nom de la chambre"])
            ->add('sonata_image.name', null , ["label" => "Image"])

            ->add('_action', null, [
                'actions' => [

                    'edit' => [],

                ],
            ])
        ;

    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('sonata_image' , MediaType::Class , [
               "label" => "Photos",
               "required" => false,
               'provider' => 'sonata.media.provider.image',
               'context'  => 'default'
           ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->add('chambre.nom_chambre' , null, ["label"=>"Chambre"]);
        $showMapper->add('sonata_image.name' , null, ["label"=>"Image"]);

    }


}
