<?php

/**
 * Theme specific functions for Theme 7
 */

use Illuminate\Support\Facades\Session;

/**
 * Get theme information
 */
function get_theme_info()
{
    return theme()->loadThemeInfo(theme()->current());
}

/**
 * Format currency based on site settings
 */
function theme5_format_currency($amount)
{
    $currency_icon = Session::get('currency_icon', '$');
    $currency_position = Session::get('currency_position', 'left');

    if ($currency_position == 'left') {
        return $currency_icon . number_format($amount, 2);
    } else {
        return number_format($amount, 2) . $currency_icon;
    }
}

/**
 * Get theme version
 */
function theme7_get_version()
{
    return '1.0.0';
}
