<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('type'),
            Field::new('name'),
            ImageField::new('picture')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/'),
            Field::new('phoneNumber'),
            Field::new('email'),
            Field::new('description'),
        ];
    }
}
