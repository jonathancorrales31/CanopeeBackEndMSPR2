<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable
    {
    yield ImageField::new('url')
        ->onlyOnIndex();
    yield TextField::new('url');
    yield TextField::new('description');
    yield TextField::new('type');
    yield IntegerField::new('ordreAffichage');

    yield AssociationField::new('prestation')
        ->setRequired(false)
        ->autocomplete();
    }
}
