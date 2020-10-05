<?php

declare(strict_types=1);

namespace DcrPHP\File;

class Directory
{
    private $directoryPath;

    /**
     * Directory constructor.
     * @param string $directoryPath
     * @throws \Exception
     */
    public function __construct($directoryPath = '')
    {
        $this->setDirectory($directoryPath);
    }

    /**
     * @param $directoryPath
     * @throws \Exception
     */
    public function setDirectory($directoryPath)
    {
        if (!file_exists($directoryPath)) {
            throw new \Exception('目录不存在');
        } else {
            if (!is_dir($directoryPath)) {
                throw new \Exception('非目录');
            } else {
                $this->directoryPath = realpath($directoryPath);
            }
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getList()
    {
        $list = scandir($this->directoryPath);
        $listDetail = array();
        foreach ($list as $name) {
            if (!in_array($name, array('.', '..'))) {
                $listDetail[] = array(
                    'name' => $name,
                    'path' => realpath($this->directoryPath . DIRECTORY_SEPARATOR . $name),
                );
            }
        }
        return $listDetail;
    }
}
