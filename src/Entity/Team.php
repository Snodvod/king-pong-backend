<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Player", inversedBy="teams")
     */
    private $players;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Match", inversedBy="teams")
     */
    private $match;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasWon;

    public function __construct(
        array $players,
        bool $hasWon,
        Match $match
    ) {
        $this->players = $players;
        $this->hasWon  = $hasWon;
        $this->score   = 5;
        $this->match   = $match;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function getMatch()
    {
        return $this->match;
    }

    public function getScore()
    {
        return $this->score;
    }
}
