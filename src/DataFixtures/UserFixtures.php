<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("lucas.marguiron@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'userpassword'
        ));
        $user->setName("Lucas Marguiron");
        $user->setBio1("Je suis un bébé développeur web");
        $user->setBio2("J'apprends le PHP et c'est bien");
        $user->setTitle("Développeur web junior");
        $user->setProfilePicture("{{ asset('img/moi.JPG') }}");
        $user->setFacebook("https://www.facebook.com/lucas.marguiron");
        $user->setTwitter("https://twitter.com/S0cialGeek");
        $user->setLinkedin("https://www.linkedin.com/in/lucas-marguiron-3682a54b/");
        $user->setGithub("https://github.com/Waagic");
        $user->setAdress("17 quai Arloing 69009 Lyon");
        $manager->persist($user);
        $manager->flush();
    }
}
