<?php

namespace App\TemplateAPP\Components;

interface HTMLCollectorInterface
{
    public function collectContent($templateName);

    public function content();

    public function renderHtml();

    public function assetsList();
}