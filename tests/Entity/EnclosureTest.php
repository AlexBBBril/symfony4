<?php

namespace App\Tests\Entity;


use App\Entity\Dino;
use App\Entity\Enclosure;
use App\Exception\DinoAreRunningRampantException;
use App\Exception\NotABuffetException;
use PHPUnit\Framework\TestCase;

class EnclosureTest extends TestCase
{
    public function testItHasNoDinosaursByDefault()
    {
        $enclosure = new Enclosure();

        $this->assertEmpty($enclosure->getDinos());
    }

    /**
     * @throws DinoAreRunningRampantException
     * @throws NotABuffetException
     */
    public function testItAddDinos()
    {
        $enclosure = new Enclosure(true);

        $enclosure->addDino(new Dino());
        $enclosure->addDino(new Dino());

        $this->assertCount(2, $enclosure->getDinos());
    }

    /**
     * @throws DinoAreRunningRampantException
     * @throws NotABuffetException
     */
    public function testItDoesNotAllowCarnivorousDinosToMixWithHerb()
    {
        $enclosure = new Enclosure(true);

        $enclosure->addDino(new Dino());

        $this->expectException(NotABuffetException::class);

        $enclosure->addDino(new Dino('Velociraptor', true));
    }

    /**
     * @expectedException \App\Exception\NotABuffetException
     * @throws DinoAreRunningRampantException
     * @throws NotABuffetException
     */
    public function testItDoesNotAllowCarnivorousDinosToCarnivorousEnclosure()
    {
        $enclosure = new Enclosure(true);

        $enclosure->addDino(new Dino('Velociraptor', true));
        $enclosure->addDino(new Dino());
    }

    /**
     * @throws DinoAreRunningRampantException
     * @throws NotABuffetException
     */
    public function testItDoesNotAllowToAddDinoToUnsecureEnclosure()
    {
        $enclosure = new Enclosure();

        $this->expectException(DinoAreRunningRampantException::class);
        $this->expectExceptionMessage('Are you craaazy???!!!');

        $enclosure->addDino(new Dino());
    }
}