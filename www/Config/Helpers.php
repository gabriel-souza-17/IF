<?php

function base_url($path = '') {

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        ? "https"
        : "http";

    $host = $_SERVER['HTTP_HOST'];

    $scriptName = dirname($_SERVER['SCRIPT_NAME']);

    $url = rtrim($protocol . "://" . $host . $scriptName, '/');

    return $url . '/' . ltrim($path, '/');
}