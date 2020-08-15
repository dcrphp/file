<?php

declare(strict_types=1);


namespace DcrPHP\File;


class Info
{
    private $path;

    public function __construct($path = '')
    {
        $this->setPath($path);
    }

    public function setPath($path)
    {
        if ($path) {
            if (!file_exists($path)) {
                throw new \Exception('文件或目录不存在');
            } else {
                $this->path = realpath($path);
            }
        }
    }

    public function getType()
    {
        if (is_file($this->path)) {
            return 'file';
        } else {
            return 'directory';
        }
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getBaseName()
    {
        $pathInfo = pathinfo($this->path);
        return $pathInfo['basename'];
    }

    public function getFileName()
    {
        $pathInfo = pathinfo($this->path);
        return $pathInfo['filename'];
    }

    public function getExtensionName()
    {
        $pathInfo = pathinfo($this->path);
        return $pathInfo['extension'];
    }

    /**
     * @param string $type 大小类型
     * @return false|int byte大小的
     */
    public function getSize($type = 'kb')
    {
        $size = filesize($this->path);
        switch ($type) {
            case 'kb':
                return $size / 1024;
            case 'mb':
                return $size / 1024 / 1024;
            case 'gb':
                return $size / 1024 / 1024 / 1024;
            default:
                return $size;
        }
    }

    public function getLastMod()
    {
        return filemtime($this->path);
    }
}