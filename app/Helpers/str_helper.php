<?php
if (!function_exists('img_check')) {
    function img_check($str = '')
    {
        $img = $str == '' ? 'no-profile.png' : $str;
        return $img;
    }
}
if (!function_exists('selected')) {
    function selected($word, $appeal)
    {
        $checked = $word == $appeal ? 'selected' : '';
        return $checked;
    }
}
