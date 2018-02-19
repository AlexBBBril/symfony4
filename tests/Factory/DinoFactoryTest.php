<?php

namespace App\Tests\Factory;


use App\Entity\Dino;
use App\Factory\DinoFactory;
use PHPUnit\Framework\TestCase;

class DinoFactoryTest extends TestCase
{
    /**
     * @var DinoFactory
     */
    private $factory;

    public function testItGrowsAVelociraptor()
    {
        /** @var Dino $dino */
        $dino = $this->factory->growVelociraptor(5);

        $this->assertInstanceOf(Dino::class, $dino);
        $this->assertInternalType('string', $dino->getGenus());
        $this->assertSame('Velociraptor', $dino->getGenus());
        $this->assertSame(5, $dino->getLength());
    }

    public function testItGrowATriceratorp()
    {
        $this->markTestIncomplete('waiting for confirmation from GenLab');
    }


    public function testItGrowABabyVelociraptor()
    {
        if (!class_exists('Nanny')) {
            $this->markTestSkipped('There is nobody to watch the baby');
        }

        $dino = $this->factory->growVelociraptor(1);
        $this->assertSame(1, $dino->getLength());
    }

    /**
     * @dataProvider getSpecTests
     *
     * @param string $spec
     * @param bool   $expectedIsLarge
     * @param bool   $expectedIsCarnivorous
     *
     * @throws \Exception
     */
    public function testItGrowADinosaurFromASpec(string $spec, bool $expectedIsLarge, bool $expectedIsCarnivorous)
    {
        $dino = $this->factory->growFromSpec($spec);

        if ($expectedIsLarge) {
            $this->assertGreaterThanOrEqual(Dino::LARGE, $dino->getLength());
        } else {
            $this->assertLessThan(Dino::LARGE, $dino->getLength());
        }

        $this->assertSame($expectedIsCarnivorous, $dino->isCarnivorous(), 'Diets do not match');
    }

    /**
     * @dataProvider getHugeDinoSpecTests
     *
     * @param string $spec
     *
     * @throws \Exception
     */
    public function testItGrowsAHugeDinosaur(string $spec)
    {
      $dino = $this->factory->growFromSpec($spec);

      $this->assertGreaterThanOrEqual(Dino::HUGE, $dino->getLength());
    }

    public function getSpecTests()
    {
        return [
            ['large carnivorous dino', true, true],
            'default response' => ['give me all the cookies!!!', false, false],
            ['large herbivore', true, false],
        ];
    }

    public function getHugeDinoSpecTests()
    {
      return [
          ['huge dinosaur'],
          ['huge dino'],
          ['huge'],
      ];
    }

    public function setUp()
    {
        $this->factory = new DinoFactory();
    }


}