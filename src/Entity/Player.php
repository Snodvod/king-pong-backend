<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 *
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", mappedBy="players")
     * @JMS\Exclude()
     */
    private $teams;

    public function __construct(string $name, int $skillValue, ?string $imageUrl)
    {
        $this->name     = $name;
        $this->skillValue = $skillValue;
        $this->imageUrl = $imageUrl;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSkillValue(): int
    {
        return $this->skillValue;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function getTeams(): array
    {
        return $this->teams->toArray();
    }
}
