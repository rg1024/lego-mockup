<?php

namespace lego\kit;

class Html
{

    public static function toHtml(\lego\kit\Kit $kit)
    {
        $html = <<<HTML
    <article class='ficha-lego'>
        <h2>{$kit->legoSet()} / {$kit->nombre()}</h2>
        <p class='instrucciones'><a href="{$kit->instrucciones()}">Instrucciones</a></p>
        <img src="images/{$kit->imagen()}">
    </article>
HTML;
        return $html;
    }
}
