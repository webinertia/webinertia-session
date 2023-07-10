<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\Session\AbstractContainer;
use Laminas\Session\ManagerInterface as Manager;

final class Container extends AbstractContainer
{
    public function __construct($name = 'App_Context', ?Manager $manager = null)
    {
        parent::__construct($name, $manager);
    }
}
