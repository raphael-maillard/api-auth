<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;
    private $structureRepository;
    private $buildingRepository;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
           
        ];

        for($i = 0; $i < count($users); ++$i){
            $user = new User();
            $user->setRoles($users[$i]['roles']);
            $user->setEmail($users[$i]['email']);
            $user->setPassword($this->encoder->encodePassword($user, $users[$i]['password']));

            $manager->persist($user);
        }

        $manager->flush();
    }
}