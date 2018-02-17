<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 17.02.2018
 * Time: 20:29
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinos")
 */
class Dino
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $length = 0;

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
}