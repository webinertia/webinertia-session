<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Session\Config\SessionConfig;
use Laminas\Session\Config\StandardConfig;
use Psr\Container\ContainerInterface;

final class ConfigFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): StandardConfig | SessionConfig
    {
        $config   = $container->get('config')['session_config'] ?? [];
        $instance = new SessionConfig();
        $instance->setOptions($config);
        return $instance;
    }
}
