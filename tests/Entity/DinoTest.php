<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 17.02.2018
 * Time: 20:13.
 */

namespace Tests\AppBundle\Entity;

use App\Entity\Dino;
use PHPUnit\Framework\TestCase;

class DinoTest extends TestCase
{
    /** @var Dino */
    private $dino;

    public function testSettingLength()
    {
        $this->assertSame(0, $this->dino->getLength());

        $this->dino->setLength(9);
        $this->assertSame(9, $this->dino->getLength());
    }

    public function testDinoHasNotShrunk()
    {
        $this->dino->setLength(15);

        $this->assertGreaterThan(16, $this->dino->getLength(), 'Did your put it in the washing machine');
    }

    protected function setUp(): void
    {
        $this->dino = new Dino();
    }
}
