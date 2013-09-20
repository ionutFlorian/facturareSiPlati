<?php

function render($templateName, $params = array())
{
    $path = 'views' . '/' . $templateName . '.php';

    // Load variables
    foreach ($params as $key => $value) {
        $$key = $value;
    }

    include ($path);
}