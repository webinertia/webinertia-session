<?php

declare(strict_types=1);

namespace Webinertia\Session;

interface SessionContainerAwareInterface
{
    public function setSessionContainer(Container $container);

    public function getSessionContainer(): Container;
}
