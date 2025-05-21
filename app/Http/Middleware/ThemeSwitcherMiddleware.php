<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ThemeSwitcherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if theme switching is enabled
        if (!config('themes.enable_switching', true)) {
            return $next($request);
        }

        // Handle theme switching if specified in request
        if ($request->has('theme')) {
            $requestedTheme = $request->theme;
            
            // Get available themes
            $availableThemes = config('themes.themes', []);
            $themeKeys = array_keys($availableThemes);
            
            // Check if the requested theme exists
            if (in_array($requestedTheme, $themeKeys) && 
                File::exists(base_path("cms/themes/{$requestedTheme}"))) {
                Session::put('selected_theme', $requestedTheme);
            }
        }
        
        // Get the selected theme from session or use the default one
        $selectedTheme = Session::get('selected_theme', config('themes.default', 'theme1'));
        
        // Set the current theme
        app('theme')->set($selectedTheme);
        
        return $next($request);
    }
} 