<?php


namespace App\DataFixtures;
use App\Entity\Screenshots;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScreenshotFixtures extends Fixture
{
    public function getDependencies()
    {
        return [ProjectFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $screenshot = new Screenshots();
        $screenshot->setTitle("Fiche action");
        $screenshot->setFile("tgg_action-5f199aa6cb3e9.png");
        $screenshot->setProject($this->getReference("TGG"));
        $manager->persist($screenshot);

        $screenshot= new Screenshots();
        $screenshot->setTitle("Timeline");
        $screenshot->setFile("tgg_timeline-5f199aa6ccd82.png");
        $screenshot->setProject($this->getReference("TGG"));
        $manager->persist($screenshot);

        $screenshot= new Screenshots();
        $screenshot->setTitle("Trombinoscope");
        $screenshot->setFile("tgg_trombi-5f199aa6cd3f5.png");
        $screenshot->setProject($this->getReference("TGG"));
        $manager->persist($screenshot);

        $manager->flush();
    }
}
