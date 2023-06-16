<?php

declare(strict_types=1);

namespace Webinertia\Session;

final class Module
{
    public function getConfig(): array
    {
        $configProvider = new ConfigProvider();
        return [
            'service_manager'    => $configProvider->getDependencyConfig(),
            'session_config'     => $configProvider->getSessionConfig(),
            'session_containers' => $configProvider->getSessionContainerConfig(),
            'session_storage'    => $configProvider->getSessionStorageConfig(),
            'session_validators' => $configProvider->getSessionValidatorConfig(),
        ];
    }
}