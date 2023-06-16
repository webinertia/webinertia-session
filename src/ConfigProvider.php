<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\Session\Config\ConfigInterface;
use Laminas\Session\ManagerInterface;
use Laminas\Session\Storage\SessionArrayStorage;
use Laminas\Session\Validator\RemoteAddr;
use Laminas\Session\Validator\HttpUserAgent;

final class ConfigProvider
{
    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                ConfigInterface::class  => ConfigFactory::class,
                ManagerInterface::class => SessionManagerFactory::class,
            ],
        ];
    }

    public function getSessionConfig(): array
    {
        return [
            'use_cookies' => true,
        ];
    }

    public function getSessionContainerConfig(): array
    {
        return [Container::class];
    }

    public function getSessionStorageConfig(): array
    {
        return [
            'type' => SessionArrayStorage::class,
        ];
    }

    public function getSessionValidatorConfig(): array
    {
        return [
            RemoteAddr::class,
            HttpUserAgent::class,
        ];
    }
}