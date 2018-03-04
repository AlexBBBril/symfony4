<?php

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/test")
 */
class TestController extends Controller
{
    /**
     * @Route("/get/{id}")
     * @Method("GET")
     *
     * @param $id
     *
     * @return Response
     */
    public function getAction($id)
    {
        return new Response('get by id = ' . $id);
    }

    /**
     * @Route("/get")
     * @Method("GET")
     *
     * @return Response
     */
    public function getAll()
    {
        return new Response('getall');
    }

    /**
     * @Route("/post")
     * @Method("POST")
     *
     * @return Response
     */
    public function post()
    {
        return new Response('getall');
    }

    /**
     * @Route("/put/{id}")
     * @Method("PUT")
     *
     * @param $id
     *
     * @return Response
     */
    public function put($id)
    {
        return new Response('put');
    }

    /**
     * @Route("/delete/{id}")
     * @Method("DELETE")
     *
     * @param $id
     *
     * @return Response
     */
    public function delete($id)
    {
        return new Response('delete');
    }
}
