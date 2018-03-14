<?php

namespace App\Service;


use App\Entity\Dino;

class DinosaurLengthDeterminator
{
    public function getLengthFromSpecification(string $specification): int
    {
        $availableLengths = [
            'huge' => ['min' => Dino::HUGE, 'max' => 100],
            'omg' => ['min' => Dino::HUGE, 'max' => 100],
            'рџ±' => ['min' => Dino::HUGE, 'max' => 100],
            'large' => ['min' => Dino::LARGE, 'max' => Dino::HUGE - 1],
        ];
        $minLength = 1;
        $maxLength = Dino::LARGE - 1;

        foreach (explode(' ', $specification) as $keyword) {
            $keyword = strtolower($keyword);

            if (array_key_exists($keyword, $availableLengths)) {
                $minLength = $availableLengths[$keyword]['min'];
                $maxLength = $availableLengths[$keyword]['max'];

                break;
            }
        }

        return random_int($minLength, $maxLength);
    }
}