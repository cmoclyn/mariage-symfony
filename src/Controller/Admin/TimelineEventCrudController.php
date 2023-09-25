<?php

namespace App\Controller\Admin;

use App\Entity\TimelineEvent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class TimelineEventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TimelineEvent::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('timeline'),
            Field::new('date'),
            Field::new('name'),
            Field::new('description'),
            ImageField::new('picture')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/'),
        ];
    }
}
