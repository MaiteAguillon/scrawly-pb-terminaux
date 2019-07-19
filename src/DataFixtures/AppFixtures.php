<?php

namespace App\DataFixtures;

use App\Entity\Poll;
use App\Entity\Choice;
use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $poll = new Poll();
        $poll->setTitle("Fête de la Musique");
        $poll->setSlug("fete-de-la-music");
        $poll->setCreatedAt(new \DateTime('2019-07-18T10:00:00'));
        $manager->persist($poll);

        $person1 = new Person();
        $person1->setUsername("Damien");
        $person1->setEmail("damien@gmail.com");
        $person1->setPoll($poll);
        $manager->persist($person1);

        $person2 = new Person();
        $person2->setUsername("Tolia");
        $person2->setEmail("tolia@sfr.fr");
        $person2->setPoll($poll);
        $manager->persist($person2);

        $person3 = new Person();
        $person3->setUsername("Jean");
        $person3->setEmail("jean@gmail.com");
        $person3->setPoll($poll);
        $manager->persist($person3);


        $choice1 = new Choice();
        $choice1->setDate(new \DateTime('2020-06-21'));
        $choice1->setPoll($poll);
        $choice1->addPerson($person1);
        $choice1->addPerson($person2);
        $manager->persist($choice1);

        $choice2 = new Choice();
        $choice2->setDate(new \DateTime('2019-06-21'));
        $choice2->setPoll($poll);
        $choice2->addPerson($person1);
        $choice2->addPerson($person3);
        $manager->persist($choice2);
        $manager->flush();
    }
}