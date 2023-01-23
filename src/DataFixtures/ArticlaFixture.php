<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlaFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorie = new Categorie();
        $categorie->setNom("Nom de la categorie");
        $manager->persist($categorie);
        for($i=1; $i<=10; $i++){
            $article = new Article();
            $article->setNom("Nom de l'article")
                ->setPrix($i*2)
                ->setCategorie($categorie);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
