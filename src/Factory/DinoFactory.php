<?php

namespace App\Factory;


use App\Entity\Dino;

class DinoFactory
{
    /**
     * @param int $length
     *
     * @return Dino
     */
    public function growVelociraptor(int $length) :Dino
    {
        return $this->createDino('Velociraptor', true, $length);
    }

    /**
     * @param string $specification
     *
     * @return Dino
     * @throws \Exception
     */
    public function growFromSpec(string $specification): Dino
    {
        $codeName = 'InG-' . random_int(1, 99999);
        $length = random_int(1, Dino::LARGE - 1);
        $isCarnivorous = false;

        if (stripos($specification, 'huge') !== false) {
            $length = random_int(Dino::HUGE, 100);
        }

        if (stripos($specification, 'large') !== false) {
            $length = random_int(Dino::LARGE, Dino::HUGE -1);
        }

        if (stripos($specification, 'carnivorous') !== false) {
            $isCarnivorous = true;
        }

        return $this->createDino($codeName, $isCarnivorous, $length);
    }

    /**
     * @param string $genus
     * @param bool   $isCarnivorous
     * @param int    $length
     *
     * @return Dino
     */
    private function createDino(string $genus, bool $isCarnivorous, int $length): Dino
    {
        $dino = new Dino($genus, $isCarnivorous);
        $dino->setLength($length);

        return $dino;
    }
}