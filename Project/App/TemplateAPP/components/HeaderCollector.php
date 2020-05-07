<?php

namespace App\TemplateAPP\Components;

class HeaderCollector implements HTMLCollectorInterface
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
        $content = $this->content();
        $styles = $this->assetsList();
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
            'title' => 'Template',
            'content' => 'Template'
        ];
        return $content;
    }

    public function assetsList()
    {
        $assets = '<link rel="stylesheet" href="' . $this->assetsDir . 'css/main.css" />';
        $assets .= '<link rel="stylesheet" href="' . $this->assetsDir . 'css/font-awesome.min.css" />';
        return $assets;
    }
}