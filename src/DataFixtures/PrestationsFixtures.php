<?php

namespace App\DataFixtures;

use App\Entity\Prestations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PrestationsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $prestations = [
            [
                'name' => 'Conception et réalisation d\'espace verts',
                'description' => 'Conception et réalisation d\'espace verts.',
                'price' => '20€ à 50€/m²',
            ],
            [
                'name' => 'Entretien des espaces verts',
                'description' => 'Entretien des espaces verts.',
                'price' => '30€ à 40€/h',
            ],
            [
                'name' => 'Taille des haies',
                'description' => 'Taille des haies.',
                'price' => '8€ à 15€/m',
            ],
            [
                'name' => 'Élagage et abatage d’arbres',
                'description' => 'Élagage et abatage d’arbres.',
                'price' => '120€ à 500€ /arbre',
            ],
            [
                'name' => 'Valorisation des déchets verts (compostage)',
                'description' => 'Valorisation des déchets verts (compostage).',
                'price' => '40€ à 100€',
            ],
            [
                'name' => 'Demande de renseignement',
                'description' => 'Conseil.',
                'price' => 'À définir',
            ],
        ];

        foreach ($prestations as $key => $data) {
            $prestation = new Prestations();

            $prestation->setName($data['name']);
            $prestation->setDescription($data['description']);
            $prestation->setPrice($data['price']);

            $manager->persist($prestation);
               switch ($key) {
        case 0:
            $this->addReference('prestation_conception', $prestation);
            break;

        case 1:
            $this->addReference('prestation_entretien', $prestation);
            break;

        case 2:
            $this->addReference('prestation_taille_haies', $prestation);
            break;

        case 3:
            $this->addReference('prestation_elagage', $prestation);
            break;

        case 4:
            $this->addReference('prestation_compostage', $prestation);
            break;
    }
        }

        $manager->flush();
    }
}