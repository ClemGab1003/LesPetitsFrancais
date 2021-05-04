<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setRoles('admin');
        $user->setFirstname('admin');
        $user->setLastname('admin');
        $user->setpassword($this->encoder->encodePassword($user, 'admin'));

        $manager->persist($user);

        $manager->flush();

        $user = new User();
        $user->setUsername('Carole.Doliprane');
        $user->setFirstname('Carole');
        $user->setLastname('Doliprane');
        $user->setpassword($this->encoder->encodePassword($user, 'classedecp'));

        $manager->persist($user);

        $manager->flush();
    }
}
