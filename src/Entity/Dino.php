<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 17.02.2018
 * Time: 20:29.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinos")
 */
class Dino
{
    const LARGE = 10;

    const HUGE = 30;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $length = 0;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $genus;

     /**
      * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isCarnivorous;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enclosure", inveredBy="dinos")
     */
    private $enclosure;

    public function __construct(string $genus = 'Unknown', bool $isCarnivorous = false)
    {
        $this->genus = $genus;
        $this->isCarnivorous = $isCarnivorous;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getCarnivorous()
    {
        return $this->isCarnivorous ? 'carnivorous' : 'non-carnivorous';
    }

    public function getSpec() :string
    {
        return sprintf('The %s %s dino is %d meters long', $this->genus, $this->getCarnivorous(), $this->length);
    }

    /**
     * @return string
     */
    public function getGenus(): string
    {
        return $this->genus;
    }

    /**
     * @return bool
     */
    public function isCarnivorous(): bool
    {
        return $this->isCarnivorous;
    }
}
