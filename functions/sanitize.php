<?php

/*
 * Escape html codes in the user input.
 */

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
