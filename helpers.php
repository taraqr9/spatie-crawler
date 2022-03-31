<?php


function parseTitle($html)
{
    // Get the text in a <title>
    $matches = array();
    preg_match("/<title>(.*)<\/title>/isU", $html, $matches);
    if (count($matches) > 1) {
        return trim($matches[1]);
    } else {
        return null;
    }
}
