<?php

namespace App\TemplateAPP;

use App\TemplateAPP\Components as ATC;

class TemplateCollector
{
    private $templateSettings;

    public function __construct(TemplateSettings $templateSettings)
    {
        $this->templateSettings = $templateSettings;
    }

    public function collectPageContent(String $footerTemplateName, String $headerTemplateName, String $bodyTemplateName)
    {
        $outputHTML = $this->collectHeaderContent(new ATC\HeaderCollector($this->templateSettings), $headerTemplateName);
        $outputHTML .= $this->collectBodyContent(new ATC\BodyCollector($this->templateSettings), $bodyTemplateName);
        $outputHTML .= $this->collectFooterContent(new ATC\FooterCollector($this->templateSettings), $footerTemplateName);
        return $outputHTML;
    }

    private function collectBodyContent(ATC\HTMLCollectorInterface $bodyCollector, String $templateName)
    {
        $contentBody = $bodyCollector->collectContent($templateName);
        return $contentBody;
    }

    private function collectHeaderContent(ATC\HTMLCollectorInterface $headerCollector, String $templateName)
    {
        $contentHeader = $headerCollector->collectContent($templateName);
        return $contentHeader;
    }

    private function collectFooterContent(ATC\HTMLCollectorInterface $footerCollector, String $templateName)
    {
        $contentFooter = $footerCollector->collectContent($templateName);
        return $contentFooter;
    }
}