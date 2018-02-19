<?php

declare(strict_types=1);

namespace App\Controller;

use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param HttpClient     $client
     * @param MessageFactory $messageFactory
     *
     * @return Response
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function homepage(HttpClient $client, MessageFactory $messageFactory)
    {
                $break = true;

        $r = 1;
        $rrrr = 3434;

        $response = $client->sendRequest($messageFactory->createRequest('GET', 'https://yandex.ru'));
        $response->getBody()->getContents();

        return new Response('first page');
    }

    /**
     * @Route("/news/{slug}")
     *
     * @param string $slug
     *
     * @return Response
     */
    public function show(String $slug)
    {
        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }
}
