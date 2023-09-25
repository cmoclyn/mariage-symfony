<?php

namespace App\Controller\Admin;

use App\Entity\Activity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ActivityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Activity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            ImageField::new('background')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/activities/'),
            ImageField::new('image')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/activities/'),
            Field::new('description'),
            AssociationField::new('people')
        ];
    }
}
