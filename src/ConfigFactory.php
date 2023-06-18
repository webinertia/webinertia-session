<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Session\Config\SessionConfig;
use Psr\Container\ContainerInterface;

class ConfigFactory implements FactoryInterface
{
    /** @param string $requestedName */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): SessionConfig
    {
        $config = $container->get('config')['session_config'] ?? [];
        $class  = new SessionConfig();
        $class->setOptions($config);
        return $class;
    }
}
