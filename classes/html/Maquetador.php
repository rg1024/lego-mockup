<?php


namespace html;

class Maquetador
{
    private $beginDelimiter;
    private $endDelimiter;
    private $templateFile;


    public function __construct($templateFile, $beginDelimiter = "%", $endDelimiter = "%")
    {
        $this->templateFile   = $templateFile;
        $this->beginDelimiter = $beginDelimiter;
        $this->endDelimiter   = $endDelimiter;
    }

    public function render($data)
    {
        $template           = self::readTemplate();
        $defaultReplacments = self::extractReplacments($template);
        $replacments        = self::mergeData($defaultReplacments, $data);
        return strtr($template, $replacments);
    }


    /* //////////////////// IMPLEMENTATION //////////////////// */

    private function mergeData($replacments, $data)
    {
        foreach ($data as $block => $content) {
            $search= $this->beginDelimiter . $block . $this->beginDelimiter;
            if (isset($replacments[$search])) {
                // && ($content instanceof Closure) ? $content(): $content);
                $replacments[$search]=  !is_string($content) && is_callable($content) ? $content(): $content;
            }
        }
        return $replacments;
    }


    private function extractReplacments($template)
    {
        $match = array();
        $pattern = "#" . preg_quote($this->beginDelimiter) . "([a-z]*)" .  preg_quote($this->endDelimiter) ."#Ui";
        if (preg_match_all($pattern, $template, $match)) {
            foreach ($match[0] as $token) {
                $replacements[$token]="";
            }
            return $replacements;
        }
        return array();
    }


    private function readTemplate()
    {
        if (file_exists($this->templateFile)) {
            return file_get_contents($this->templateFile);
        } else {
            return "Template file not found" ;
        }
    }
}
