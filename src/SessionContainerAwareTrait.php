<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\Session\Container as LaminasContainer;
use Webinertia\Session\Container;

trait SessionContainerAwareTrait
{
    /** @var Container|LaminasContainer $sessionContainer */
    protected $sessionContainer;

    public function setSessionContainer(Container|LaminasContainer $container)
    {
        $this->sessionContainer = $container;
    }

    public function getSessionContainer(): Container
    {
        return $this->sessionContainer;
    }
}