<?php

namespace lego\kits;

class Html
{

    public static function toHtml(\lego\kits\Kits $kits, $messageWhenListIsEmpty)
    {
        if ($kits->count()) {
            return self::render($kits);
        } else {
            return self::emptyList($messageWhenListIsEmpty);
        }
    }

    /* /////////// IMPLEMENTATION ////////// */

    private static function emptyList($message)
    {
        return
            "\n<div class='kits-list kits-empty-list'>".
            "<p>$message</p>".
            "\n</div>";

    }

    private static function render($kits)
    {
        $html = "\n<div class='kits-list'>";
        $counter = 0;
        foreach ($kits as $kit) {
            $html .= "\n" . \lego\kit\Html::toHtml($kit);
            $counter++;
        }
        $html .= "\n</div>\n<p class='kits-total'>Total de kits: <strong>{$counter}</strong></p>";
        return $html;
    }
}
