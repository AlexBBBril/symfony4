<?php

declare(strict_types=1);

namespace App\Routing;


use App\Action\ActionFactory;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class ActionLoader extends Loader
{
    /**
     * @var ActionFactory
     */
    private $factory;

    public function __construct(ActionFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Возвращает коллекцию роутеров задействующих функционал экшенов
     *
     * @param mixed       $resource
     * @param string|null $type
     *
     * @return RouteCollection
     */
    public function load($resource, $type = null): RouteCollection
    {
        $collection = new RouteCollection();

        foreach ($this->factory->getActions() as $action) {
            $collection->addCollection($this->import($action, 'annotation'));
        }

        return $collection;
    }

    /**
     * @param mixed       $resource
     * @param string|null $type
     *
     * @return bool
     */
    public function supports($resource, $type = null): bool
    {
        return 'action' === $type;
    }
}
