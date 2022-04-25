<?php
if (!function_exists('base_admin')) {
    function base_admin($link = '')
    {
        $link = (substr($link, 0, 1) != '/') ? '/' . $link : $link;
        $baseUrl = base_url('/administrator') . $link;
        return $baseUrl;
    }
}
if (!function_exists('base_user')) {
    function base_user($link = '')
    {
        $link = (substr($link, 0, 1) != '/') ? '/' . $link : $link;
        $baseUrl = base_url('/users') . $link;
        return $baseUrl;
    }
}
