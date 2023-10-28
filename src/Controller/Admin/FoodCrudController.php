<?php

namespace App\Controller\Admin;

use App\Entity\Food;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class FoodCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Food::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            Field::new('type'),
            Field::new('description'),
            // Field::new('price'),
            MoneyField::new('price')->setCurrency('EUR'),
            Field::new('isHot'),
            Field::new('isGlutenFree'),
            Field::new('isLactoseFree'),
        ];
    }
}
