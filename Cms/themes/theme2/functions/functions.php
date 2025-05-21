<?php

/**
 * Theme specific functions for Theme 2
 */

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
function theme2_format_currency($amount)
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
function theme2_get_version()
{
    return '1.0.0';
}
