<?php

namespace App\Controller\Admin;

use App\Entity\Timeline;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class TimelineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Timeline::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
        ];
    }
}
