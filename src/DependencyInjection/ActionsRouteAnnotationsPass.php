<?php

declare(strict_types=1);

namespace App\DependencyInjection;


use App\Action\ActionFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ActionsRouteAnnotationsPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\InvalidArgumentException
     */
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(ActionFactory::class)) {
            return;
        }

        $definition = $container->findDefinition(ActionFactory::class);
        $actions = $container->findTaggedServiceIds('route.annotation');
        foreach ($actions as $id => $tags) {
            $definition->addMethodCall('addAction', [$id]);
        }
    }
}
