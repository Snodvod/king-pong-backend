<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $skillValue;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $imageUrl;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Match", mappedBy="winners")
     */
    private $matchesWon;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Match", mappedBy="teamA")
     */
    private $matchesA;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Match", mappedBy="teamB")
     */
    private $matchesB;

    public function __construct(string $name, ?string $imageUrl)
    {
        $this->name     = $name;
        $this->imageUrl = $imageUrl;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSkillValue(): int
    {
        return $this->skillValue;
    }


    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getMatchesWon()
    {
        return $this->matchesWon;
    }

    public function getMatchesA(): Collection
    {
        return $this->matchesA;
    }

    public function getMatchesB(): Collection
    {
        return $this->matchesB;
    }

    public function getMatchesPlayed(): array
    {
        return array_merge($this->getMatchesA()->toArray(), $this->getMatchesB()->toArray());
    }

}

