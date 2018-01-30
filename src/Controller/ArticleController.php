<?php

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('first page');
    }

    /**
     * @Route("/news/{slug}")
     * @param String $slug
     *
     * @return Response
     */
    public function show(String $slug)
    {
        return new Response(sprintf("Second page for %s", $slug));
    }


}