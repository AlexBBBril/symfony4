<?php

namespace App\Controller;


use App\Entity\Role;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/test")
 */
class TestController extends Controller
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * TestController constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->om = $objectManager;
    }

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
        $user = $this->om->getRepository(User::class)->find(1);
        //$role = $user->getRoles();

        //$users = $this->om->getRepository(Role::class)->getUsersInRoleArray(['ROLE_USER']);


        return new JsonResponse(print_r(324234));
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
