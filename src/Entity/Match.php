<?php

declare(strict_types=1);

namespace App\Entity;

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Player", inversedBy="matchesA")
     */
    private $teamA;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Player", inversedBy="matchesB")
     */
    private $teamB;

    /**
     * @ORM\Column(type="integer")
     */
    private $scoreA;

    /**
     * @ORM\Column(type="integer")
     */
    private $scoreB;

    public function __construct(
        array $teamA,
        array $teamB,
        int $scoreA,
        int $scoreB
    )
    {

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSkillValue(): int
    {
        return $this->skillValue;
    }
}

