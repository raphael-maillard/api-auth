<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $faker = \Faker\Factory::create('fr_FR');
        $faker = \Faker\Factory::create();


        for($i = 0; $i < 11 ; ++$i){
            $user = new User();
            $user->setEmail($faker->email());
            $user->setPassword($this->encoder->encodePassword($user, "mdp"));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
?>