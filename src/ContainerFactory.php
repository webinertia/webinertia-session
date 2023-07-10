<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Session\ManagerInterface;
use Psr\Container\ContainerInterface;

final class ContainerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): Container
    {
        return new $requestedName('App_Context', $container->get(ManagerInterface::class));
    }
}
