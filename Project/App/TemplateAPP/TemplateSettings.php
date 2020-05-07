<?php


namespace App\TemplateAPP;


class TemplateSettings
{
    protected $templateDir;
    protected $assetsDir;
    protected $mediaDir;
    private static $instance = null;

    private function __construct()
    {

    }

    public function setAssetsDir(String $dirPath)
    {
        $this->assetsDir = $dirPath;
    }

    public function setTemplatesDir(String $dirPath)
    {
        $this->templateDir = $dirPath;
    }

    public function setMediaDir(String $dirPath)
    {
        $this->mediaDir = $dirPath;
    }

    public function getAssetsDir()
    {
        return $this->assetsDir;
    }

    public function getMediaDir()
    {
        return $this->mediaDir;
    }

    public function getTemplatesDir()
    {
        return $this->templateDir;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new TemplateSettings();
        }
        return self::$instance;
    }
}