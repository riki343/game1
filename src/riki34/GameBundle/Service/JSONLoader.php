<?php

namespace riki34\GameBundle\Service;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;

class JSONLoader {
    /** @var Filesystem $fs */
    private $fs;

    public function __construct() {
        $this->fs = new Filesystem();
    }

    /**
     * @param string $filename
     * @return mixed
     */
    public function loadFile($filename) {
        return ($this->fs->exists($filename)) ? json_decode(file_get_contents($filename), true) : null;
    }

    /**
     * @param string $filename
     * @param array $content
     */
    public function storeFile($filename, $content) {
        if (!$this->fs->exists($filename)) {
            $this->createFile($filename);
        }

        file_put_contents($filename, json_encode($content));
    }

    /**
     * @param string $filename
     */
    public function createFile($filename) {
        if ($this->fs->exists($filename)) {
            throw new Exception('File already exist');
        } else {
            $this->fs->touch($filename);
        }
    }
}