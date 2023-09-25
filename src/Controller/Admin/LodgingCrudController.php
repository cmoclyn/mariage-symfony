<?php

namespace App\Controller\Admin;

use App\Entity\Lodging;
use App\Enum\LodgingType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class LodgingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lodging::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            ChoiceField::new('type')->setChoices([
                "airbnb" => "airbnb",
                "Chambre d'hôte" => "Chambre d'hôte",
                "Château" => "Château",
                "Gîte" => "Gîte",
                "Hôtel" => "Hôtel",
                "Maison de Maître" => "Maison de Maître",
            ]),
            Field::new('roomNumber'),
            Field::new('distance'),
            Field::new('phoneNumber'),
            Field::new('email'),
            Field::new('website'),
            Field::new('address'),
            Field::new('mapsLink'),
            ImageField::new('picture')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/')
                ->hideOnIndex(),
            AssociationField::new('people'),
        ];
    }
}
