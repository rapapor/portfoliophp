<?php

namespace My\FrontendBundle\DataFixture\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use My\FrontendBundle\Entity\NAMES;

class LoadData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $data =file('data/imiona.txt');
        foreach ($data as $i)
        {
            $Name = new NAMES();
            $Name->setCaption(trim($i));
            $manager->persist($Name);

        }
        $manager->flush();
    }
}