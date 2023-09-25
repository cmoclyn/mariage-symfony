<?php

namespace App\Controller\Admin;

use App\Entity\Person;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class PersonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Person::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('firstname'),
            Field::new('lastname'),
            Field::new('isAnnouncementSent'),
            Field::new('replied'),
            Field::new('comeToTownHall'),
            Field::new('comeToParty'),
            AssociationField::new('tableDinner')->setFormTypeOption('required', false),
            AssociationField::new('lodging')->setFormTypeOption('required', false),
            AssociationField::new('menu')->setFormTypeOption('required', false),
        ];
    }

}
