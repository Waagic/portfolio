<?php


namespace App\DataFixtures;

use App\Entity\Language;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function getDependencies()
    {
        return [LanguageFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $project = new Project();
        $project->setTitle("La Gare Centrale - The Greener Good");
        $project->setLogo("tgg.png");
        $project->setCover("tgg.png");
        $project->setBaseline("Extranet d'informations pour une association lyonnaise");
        $project->setDescription1("The Greener Good est une association lyonnaise qui oeuvre pour la promotion des modes de vie éco-responsable et alternatifs");
        $project->setDescription2("Le projet de La Gare Centrale avait pour but de créer un extranet pour l'association permettant de centraliser tous les documents et outils de l'association, de lister les évènements passés et à venir et permettre aux bénévoles de s'informer et sauvegarder leurs connaissances");
        $project->setLink("https://garecentrale.thegreenergood.fr/");
        $project->addLanguage($this->getReference("PHP"));
        $project->addLanguage($this->getReference("JavaScript"));
        $project->addLanguage($this->getReference("Symfony"));
        $project->addLanguage($this->getReference("CSS"));
        $project->addLanguage($this->getReference("HTML"));
        $this->addReference('TGG', $project);
        $manager->persist($project);
        $manager->flush();
    }
}
