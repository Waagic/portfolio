<?php


namespace App\DataFixtures;

use App\Entity\Projects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $project = new Projects();
        $project->setTitle("Social Geek");
        $project->setLogo("{{ asset('img/socialgeek.png') }}");
        $project->setBaseline("Un incroyable blog");
        $project->setDescription1("C'est mon blog, depuis plus de 10 ans !");
        $project->setDescription2("Et ouais c'est un Wordpress, kestuvafaire ?");
        $project->setLink("http://www.socialgeek.fr");
        $manager->persist($project);
        $manager->flush();
    }
}
