<?php

namespace App\Tests\Service;


use App\Entity\Dino;
use App\Service\DinosaurLengthDeterminator;
use PHPUnit\Framework\TestCase;

class DinosaurLengthDeterminatorTest extends TestCase
{
    /**
     * @dataProvider getSpecLengthTest
     *
     * @param $spec
     * @param $minExpectedSize
     * @param $maxExpectedSize
     */
    public function testItReturnsCorrectLengthRange($spec, $minExpectedSize, $maxExpectedSize): void
    {
        $determinator = new DinosaurLengthDeterminator();
        $actualSize = $determinator->getLengthFromSpecification($spec);

        $this->assertGreaterThanOrEqual($minExpectedSize, $actualSize);
        $this->assertLessThanOrEqual($maxExpectedSize, $actualSize);
    }

    /**
     * @return array
     */
    public function getSpecLengthTest(): array
    {
        return [
            ['large carnivorous dino', Dino::LARGE, Dino::HUGE - 1],
            'default response' => ['give me all the cookies!!!', 0, Dino::LARGE - 1],
            ['large herbivore', Dino::LARGE, Dino::HUGE - 1],
            ['huge dinosaur', Dino::HUGE, 100],
            ['huge dino', Dino::HUGE, 100],
            ['huge', Dino::HUGE, 100],
        ];
    }
}