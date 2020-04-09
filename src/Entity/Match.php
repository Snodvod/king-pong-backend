<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $playedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Team", mappedBy="match")
     */
    private $teams;

    public function __construct()
    {
        $this->playedAt = new \DateTimeImmutable();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPlayedAt(): \DateTimeImmutable
    {
        return $this->playedAt;
    }

    public function getTeams()
    {
        return $this->teams;
    }
}

