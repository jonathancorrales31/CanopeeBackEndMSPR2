<?php

namespace App\DataFixtures;

use App\Entity\Text;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TextFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $texts = [

            [
                'titre' => 'La société Canopée',
                'description' => null,
                'type' => 'Presentation',
                'contenu' => "<p>Canopées a été créée en 2020 par Bob et Tom, 2 amoureux de la nature.
           La société est spécialisée dans la création et l’entretien d’espaces verts pour les
           particuliers, les professionnels et les collectivités territoriales.</p>

        <p>Les activités de la société sont les suivantes :</p>

        <ul>
          <li>Conception et réalisation d’espace verts</li>
          <li>Entretien des espaces verts</li>
          <li>Taille des haies</li>
          <li>Élagage et abattage d'arbres</li>
          <li>Valorisation des déchets verts</li>
        </ul>"
            ],

            [
                'titre' => 'A QUI S’ADRESSE NOS SERVICES ?',
                'description' => null,
                'type' => 'PublicCible',
                'contenu' => "<p>Que vous soyez un particulier, une entreprise ou une collectivité territoriale, c’est avec plaisir que nous viendrons mettre notre expertise pour prendre soin de vos espaces verts.</p>"
            ],

            [
                'titre' => 'Bob',
                'description' => null,
                'type' => 'BobBio',
                'contenu' => "<p>Bob est un paysagiste expérimenté, reconnu pour son savoir-faire et son efficacité sur le terrain. Polyvalent et engagé, il intervient sur tous types de projets d’aménagement avec sérieux et professionnalisme. Son objectif : créer des espaces extérieurs fonctionnels, soignés et adaptés à chaque client.</p>

      <p>Avec Tom, il a cofondé Canopées, une entreprise née de leur passion commune pour le paysage et leur envie de proposer des réalisations durables, alliant technique et sens esthétique.</p>"
            ],

            [
                'titre' => 'Tom',
                'description' => null,
                'type' => 'TomBio',
                'contenu' => "<p>Passionné par la nature depuis toujours, Tom est un paysagiste rigoureux et créatif. Il aime transformer les espaces extérieurs en lieux harmonieux et vivants, en accord avec l’environnement. Grâce à son sens du détail et son écoute des besoins, il conçoit des jardins à la fois esthétiques et durables.</p>

      <p>Co-fondateur de la société Canopées, il met son expertise au service de projets sur mesure, avec l’ambition de réinventer les espaces verts et de rapprocher chacun de la nature.</p>"
            ],

        ];


        foreach ($texts as $data) {

            $text = new Text();

            $text->setTitre($data['titre']);
            $text->setDescription($data['description']);
            $text->setType($data['type']);
            $text->setContenu($data['contenu']);

            $manager->persist($text);
        }

        $manager->flush();
    }
}