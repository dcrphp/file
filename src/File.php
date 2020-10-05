<?php

declare(strict_types=1);

namespace DcrPHP\File;

use Symfony\Component\Filesystem\Filesystem;

class File
{
    private $clsFilesystem;

    public function __construct()
    {
        $this->clsFilesystem = new Filesystem();
    }

    public function __call($method, $arguments)
    {
        return $this->clsFilesystem->$method(...$arguments);
    }
}
