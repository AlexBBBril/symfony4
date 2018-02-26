<?php

namespace App\Service;


use Doctrine\Common\Persistence\ObjectManager;

class TokenManager
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * TokenManager constructor.
     *
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function createToken()
    {

    }

    public function getToken()
    {

    }
}