<?php

require_once("../vendor/autoload.php");

use DcrPHP\File\Directory;
use DcrPHP\File\File;
use DcrPHP\File\Info;

ini_set('display_errors', 'on');

try {
    $clsDirectory = new Directory(__DIR__ . DIRECTORY_SEPARATOR . '..');
    //$clsDirectory->setDirectory( __DIR__ );
    $list = $clsDirectory->getList();
    foreach ($list as $detail) {
        $clsInfo = new Info($detail['path']);
        echo 'path:' . $clsInfo->getPath();
        echo "\r\n";
        echo 'type:' . $clsInfo->getType();
        echo "\r\n";
        echo 'base name:' . $clsInfo->getBaseName();
        echo "\r\n";
        echo 'file name:' . $clsInfo->getFileName();
        echo "\r\n";
        echo 'extension name:' . $clsInfo->getExtensionName();
        echo "\r\n";
        echo 'size:' . $clsInfo->getSize('kb') . 'kb';
        echo "\r\n";
        echo 'lastmod:' . date('Y-m-d H:i:s', $clsInfo->getLastMod());
        echo "\r\n";
        echo "-------";
        echo "\r\n";
        echo "\r\n";
    }

    //基本操作请看:https://symfony.com/doc/current/components/filesystem.html
    $clsFile = new File();
    echo 'file exists:' . $clsFile->exists(__DIR__ . DIRECTORY_SEPARATOR . 'index.php');
} catch (Exception $e) {
}
