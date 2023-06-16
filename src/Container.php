<?php

declare(strict_types=1);

namespace Webinertia\Session;

use Laminas\Session\AbstractContainer;

class Container extends AbstractContainer
{
    /** @var string $context */
    protected $context;
}
