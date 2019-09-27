<?php


namespace App\Services;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationManager
{

    private $passwordEncoder;
    /**
     * @var ObjectManager
     */
    private $manager;

    public function  __construct(UserPasswordEncoderInterface $passwordEncoder, ObjectManager $manager)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->manager = $manager;
    }
    public function save(User $user): void
    {
        $encodedPassword = $this->passwordEncoder->encodePassword($user,$user->getPassword());
        $user->setPassword($encodedPassword);
        $this->manager->persist($user);
        $this->manager->flush();;

        //dump($encodedPassword,$user);die;
    }

}