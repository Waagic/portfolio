<?php


namespace App\DataFixtures;

use App\Entity\Infos;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class InfosFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $infos = new Infos();
        $infos->setName("Lucas Marguiron");
        $infos->setBio("Je suis un bébé développeur web");
        $infos->setTitle("Développeur web junior");
        $infos->setProfilePicture("{{ asset('img/moi.JPG') }}");
        $infos->setFacebook("https://www.facebook.com/lucas.marguiron");
        $infos->setTwitter("https://twitter.com/S0cialGeek");
        $infos->setLinkedin("https://www.linkedin.com/in/lucas-marguiron-3682a54b/");
        $infos->setGithub("https://github.com/Waagic");
        $infos->setAdress("17 quai Arloing 69009 Lyon");
        $manager->persist($infos);
        $manager->flush();
    }
}
