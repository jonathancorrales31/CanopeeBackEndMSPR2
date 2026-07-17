<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();

        $admin->setPrenom('Admin');
        $admin->setNom('Demo');
        $admin->setTelephone('0600000000');
        $admin->setAdresse('Adresse de démonstration');
        $admin->setEmail('admin2@canopee.fr');

        $password = $this->passwordHasher->hashPassword(
            $admin,
            'admin'
        );

        $admin->setPassword($password);
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $manager->flush();
    }
}