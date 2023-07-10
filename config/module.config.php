<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\Session\Config\ConfigInterface;
use Laminas\Session\Container as DefaultContainer;
use Laminas\Session\SaveHandler\SaveHandlerInterface;
use Laminas\Session\Service\SessionConfigFactory;
use Laminas\Session\Storage\SessionArrayStorage;
use Laminas\Session\ManagerInterface;
use Laminas\Session\Validator\HttpUserAgent;
use Laminas\Session\Validator\RemoteAddr;
use Webinertia\Session;

return [
    'session_config'     => [
        'use_cookies'         => true, // I mean who doesn't like cookies?
        'gc_maxlifetime'      => 86400,
        'remember_me_seconds' => 86400, // Can be safely set or changed after the session has been started
        'cookie_httponly'     => true,  // Example only
        'cookie_secure'       => false, // Example only
    ],
    'session_manager' => [
        'validators' => [
            //RemoteAddr::class,
            HttpUserAgent::class,
        ],
    ],
    'session_containers' => [
       //Session\Container::class,
       //'App_Context',
    ],
    'session_storage'    => [
        'type' => SessionArrayStorage::class, // if youre Unit, Integration testing you may want to set this to ArrayStorage
    ],
    'service_manager' => [
        'factories' => [
            ConfigInterface::class          => Session\ConfigFactory::class,
            Session\Container::class        => Session\ContainerFactory::class,
            ManagerInterface::class => Session\SessionManagerFactory::class,
            SaveHandlerInterface::class => SaveHandlerFactory::class, // <- uncomment this if you want to use db driven sessions
        ],
    ],
    'session_save_handler_options' => [ // option to db table column map
        'idColumn'       => 'id',
        'nameColumn'     => 'name',
        'modifiedColumn' => 'modified',
        'lifetimeColumn' => 'lifetime',
        'dataColumn'     => 'data',
    ],
    'session_table_name' => 'session', // db table name for the save handler to write too
];