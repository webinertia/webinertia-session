<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\Session\Container as LaminasContainer;

trait SessionContainerAwareTrait
{
    /** @var Container|LaminasContainer $sessionContainer */
    protected $session;

    public function setSessionContainer(Container|LaminasContainer $container)
    {
        $this->session = $container;
    }

    public function getSessionContainer(): Container
    {
        return $this->session;
    }
}
