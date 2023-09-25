<?php

namespace App\Controller\Admin;

use App\Entity\TableDinner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class TableDinnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TableDinner::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            AssociationField::new('people')
        ];
    }
}
