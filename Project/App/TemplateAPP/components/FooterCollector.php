<?php

namespace App\TemplateAPP\Components;

class FooterCollector implements HTMLCollectorInterface
{
    private $templatePath;
    protected $templateDir;
    protected $assetsDir;
    protected $mediaDir;

    public function __construct($templateSettings)
    {
        $this->templateDir = $templateSettings->getTemplatesDir();
        $this->mediaDir = $templateSettings->getMediaDir();
        $this->assetsDir = $templateSettings->getAssetsDir();
    }

    public function collectContent($templateName)
    {
        $this->templatePath = $this->templateDir . $templateName;
        $renderedContent = $this->renderHtml();
        return $renderedContent;
    }

    public function renderHtml()
    {
        $scripts = $this->assetsList();
        $content = $this->content();
        ob_start();
        require_once($this->templatePath);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function content()
    {
        $content = [
            'mediaDir' => $this->mediaDir,
            'content' => 'Template footer'
        ];
        return $content;
    }

    public function assetsList()
    {
        $assets = '<script src="' . $this->assetsDir . 'js/jquery.min.js"></script>';
        $assets .= '<script src="' . $this->assetsDir . 'js/browser.min.js"></script>';
        $assets .= '<script src="' . $this->assetsDir . 'js/breakpoints.min.js"></script>';
        $assets .= '<script src="' . $this->assetsDir . 'js/util.js"></script>';
        $assets .= '<script src="' . $this->assetsDir . 'js/main.js"></script>';
        return $assets;
    }
}