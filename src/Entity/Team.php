<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
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

    public function __construct(
        Collection $players,
        int $score
    )
    {
        $this->players = $players;
        $this->score = $score;
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
