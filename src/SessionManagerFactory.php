<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Session\Config\ConfigInterface;
use Laminas\Session\Config\SessionConfig;
use Laminas\Session\SaveHandler\SaveHandlerInterface;
use Laminas\Session\SessionManager;
use Laminas\Session\Storage\StorageInterface;
use Psr\Container\ContainerInterface;

final class SessionManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): SessionManager
    {
        $config               = $container->has('config') ? $container->get('config') : [];
        $sessionManagerConfig = $config['session_manager'];
        $validators           = $sessionManagerConfig['validators'] ?? [];
        $options              = $sessionManagerConfig['options'] ?? [];
        $config               = $config['session_config'] ?? [];

        $sessionConfig = ! empty($config['config_class']) ? new $config['config_class']() : new SessionConfig();
        $sessionConfig->setOptions($config);
        return new SessionManager(
            $container->has(ConfigInterface::class) ? $container->get(ConfigInterface::class) : $sessionConfig,
            $container->has(StorageInterface::class) ? $container->get(StorageInterface::class) : null,
            $container->has(SaveHandlerInterface::class) ? $container->get(SaveHandlerInterface::class) : null,
            $validators,
            $options
        );
    }
}
