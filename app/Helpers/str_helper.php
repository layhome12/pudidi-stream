<?php
if (!function_exists('img_check')) {
    function img_check($str = '')
    {
        $img = $str == '' ? 'no-image.png' : $str;
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
if (!function_exists('nickname')) {
    function nickname($name)
    {
        $ex1 = explode(' ', $name)[0];
        $ex2 = isset(explode(' ', $name)[1]) ? substr(explode(' ', $name)[1], 0, 1) : '';
        $nickname = $ex1 . ' ' . $ex2;
        return $nickname;
    }
}
if (!function_exists('seo_url')) {
    function seo_url($text)
    {
        $seo = url_title(strtolower($text));
        return $seo;
    }
}
if (!function_exists('month_name')) {
    function month_name($month)
    {
        switch ($month) {
            case 1:
                $month_name = 'JAN';
                break;
            case 2:
                $month_name = 'FEB';
                break;
            case 3:
                $month_name = 'MAR';
                break;
            case 4:
                $month_name = 'APR';
                break;
            case 5:
                $month_name = 'MEI';
                break;
            case 6:
                $month_name = 'JUN';
                break;
            case 7:
                $month_name = 'JUL';
                break;
            case 8:
                $month_name = 'AGU';
                break;
            case 9:
                $month_name = 'SEP';
                break;
            case 10:
                $month_name = 'OKT';
                break;
            case 11:
                $month_name = 'NOV';
                break;
            case 12:
                $month_name = 'DES';
                break;
            default:
                $month_name = '-';
                break;
        }

        return $month_name;
    }
}
