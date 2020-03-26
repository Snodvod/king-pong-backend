<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $players = json_decode(
            file_get_contents(__DIR__ . '/data/players.json'),
            true
        );

        foreach ($players as $player) {
            $player = new Player(
                $player['name'],
                $player['value'],
                $player['image']
            );

            $manager->persist($player);
        }

        $manager->flush();
    }
}
