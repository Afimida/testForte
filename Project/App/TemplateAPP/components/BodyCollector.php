<?php

namespace App\TemplateAPP\Components;

class BodyCollector implements HTMLCollectorInterface
{
    private $templateName;
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
        $this->templateName = $this->templateDir . $templateName;
        $renderedContent = $this->renderHtml();
        return $renderedContent;
    }

    public function content()
    {
        $content = [
            'mediaDir' => $this->mediaDir,
            'content' => 'Template footer'
        ];
        return $content;
    }

    public function renderHtml()
    {
        $content = $this->content();
        ob_start();
        require_once($this->templateName);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function assetsList()
    {
        $assets = '';
        return $assets;
    }
}