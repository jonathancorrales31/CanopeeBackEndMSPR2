<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Prestations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\PrestationsFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $images = [

            // Slider

            [
                'url' => 'images/imageaccueil.jpg',
                'description' => 'Première image du slider d\'accueil',
                'type' => 'Slider',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/cordiste.jpg',
                'description' => 'Un cordiste sur un arbre',
                'type' => 'Slider',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_elagage'
            ],

            [
                'url' => 'images/jardin2.jpg',
                'description' => 'un beau jardin',
                'type' => 'Slider',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/jardin3.jpg',
                'description' => 'un beau jardin',
                'type' => 'Slider',
                'ordreAffichage' => 4,
                'prestation' => 'prestation_conception'
            ],


            // Carousel

            [
                'url' => 'images/carousel1.jpg',
                'description' => 'Un beau jardin entourant une allée lumineuse',
                'type' => 'Carousel',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/carousel2.jpg',
                'description' => 'un beau jardin',
                'type' => 'Carousel',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/carousel3.jpg',
                'description' => 'un beau jardin',
                'type' => 'Carousel',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/carousel4.jpg',
                'description' => 'un beau jardin',
                'type' => 'Carousel',
                'ordreAffichage' => 4,
                'prestation' => null
            ],

            [
                'url' => 'images/carousel5.jpg',
                'description' => 'un beau jardin',
                'type' => 'Carousel',
                'ordreAffichage' => 5,
                'prestation' => null
            ],

            [
                'url' => 'images/carousel6.jpg',
                'description' => 'un beau jardin',
                'type' => 'Carousel',
                'ordreAffichage' => 6,
                'prestation' => null
            ],


            // Couverture / Bio

            [
                'url' => 'images/bob-et-tom.png',
                'description' => 'Photo de Bob et Tom souriants',
                'type' => 'Couverture',
                'ordreAffichage' => 1,
                'prestation' => null
            ],

            [
                'url' => 'images/bob.png',
                'description' => 'photo de bob',
                'type' => 'Bio',
                'ordreAffichage' => 1,
                'prestation' => null
            ],

            [
                'url' => 'images/tom.png',
                'description' => 'photo de tom',
                'type' => 'Bio',
                'ordreAffichage' => 2,
                'prestation' => null
            ],

                        // Prestation

            [
                'url' => 'images/conception.jpg',
                'description' => 'un beau jardin',
                'type' => 'Prestation',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/maintenance.jpg',
                'description' => 'Entretien des espaces verts',
                'type' => 'Prestation',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_entretien'
            ],

            [
                'url' => 'images/trimming.jpg',
                'description' => 'Taille des haies',
                'type' => 'Prestation',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_taille_haies'
            ],

            [
                'url' => 'images/tree-felling.jpg',
                'description' => 'Elagage et abatage d\'arbres',
                'type' => 'Prestation',
                'ordreAffichage' => 4,
                'prestation' => 'prestation_elagage'
            ],

            [
                'url' => 'images/composting.jpg',
                'description' => 'Compostage',
                'type' => 'Prestation',
                'ordreAffichage' => 5,
                'prestation' => 'prestation_compostage'
            ],


            // PrestationModale - Entretien

            [
                'url' => 'images/maintenance1.jpg',
                'description' => 'Entretien des espaces verts',
                'type' => 'PrestationModale',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_entretien'
            ],

            [
                'url' => 'images/maintenance2.jpg',
                'description' => 'Entretien des espaces verts',
                'type' => 'PrestationModale',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_entretien'
            ],

            [
                'url' => 'images/maintenance3.jpg',
                'description' => 'Entretien des espaces verts',
                'type' => 'PrestationModale',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_entretien'
            ],


            // PrestationModale - Taille

            [
                'url' => 'images/trimming1.jpg',
                'description' => 'Taille des haies',
                'type' => 'PrestationModale',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_taille_haies'
            ],

            [
                'url' => 'images/trimming2.jpg',
                'description' => 'Taille des haies',
                'type' => 'PrestationModale',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_taille_haies'
            ],

            [
                'url' => 'images/trimming3.jpg',
                'description' => 'Taille des haies',
                'type' => 'PrestationModale',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_taille_haies'
            ],


            // PrestationModale - Elagage

            [
                'url' => 'images/tree-felling1.jpg',
                'description' => 'Elagage et abatage d\'arbres',
                'type' => 'PrestationModale',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_elagage'
            ],

            [
                'url' => 'images/tree-felling2.jpg',
                'description' => 'Elagage et abatage d\'arbres',
                'type' => 'PrestationModale',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_elagage'
            ],

            [
                'url' => 'images/tree-felling3.jpg',
                'description' => 'Elagage et abatage d\'arbres',
                'type' => 'PrestationModale',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_elagage'
            ],


            // PrestationModale - Compostage

            [
                'url' => 'images/composting1.jpg',
                'description' => 'Compostage',
                'type' => 'PrestationModale',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_compostage'
            ],

            [
                'url' => 'images/composting2.jpg',
                'description' => 'Compostage',
                'type' => 'PrestationModale',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_compostage'
            ],

            [
                'url' => 'images/composting3.jpg',
                'description' => 'Compostage',
                'type' => 'PrestationModale',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_compostage'
            ],

                        // PrestationModale - Conception

            [
                'url' => 'images/carousel1.jpg',
                'description' => 'un beau jardin',
                'type' => 'PrestationModale',
                'ordreAffichage' => 1,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/carousel2.jpg',
                'description' => 'un beau jardin',
                'type' => 'PrestationModale',
                'ordreAffichage' => 2,
                'prestation' => 'prestation_conception'
            ],

            [
                'url' => 'images/carousel3.jpg',
                'description' => 'un beau jardin',
                'type' => 'PrestationModale',
                'ordreAffichage' => 3,
                'prestation' => 'prestation_conception'
            ],
        ];


        foreach ($images as $data) {

            $image = new Image();

            $image->setUrl($data['url']);
            $image->setDescription($data['description']);
            $image->setType($data['type']);
            $image->setOrdreAffichage($data['ordreAffichage']);

            if ($data['prestation'] !== null) {
                $image->setPrestation(
                    $this->getReference($data['prestation'], Prestations::class)
                );
            }

            $manager->persist($image);
        }

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [
            PrestationsFixtures::class,
        ];
    }
}