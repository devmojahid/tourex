<?php

namespace App\Themes\Core;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class Theme
{
    protected $name;
    protected $active;
    protected $path;
    protected $config;
    protected $breadcrumbs = [];
    protected $assets = [
        'styles' => [],
        'scripts' => [],
        'inline_styles' => [],
        'inline_scripts' => [],
    ];

    /**
     * Create a new Theme instance.
     *
     * @param string $name
     * @return void
     */
    public function __construct($name = null)
    {
        $this->name = $name;
        $this->path = $this->getThemePath($name);
        $this->config = $this->loadConfig();
    }

    /**
     * Set the current theme.
     *
     * @param string $name
     * @return $this
     */
    public function set($name)
    {
        $this->name = $name;
        $this->path = $this->getThemePath($name);
        $this->config = $this->loadConfig();

        return $this;
    }

    /**
     * Get the current theme name.
     *
     * @return string
     */
    public function current()
    {
        return $this->name;
    }

    /**
     * Get the theme path.
     *
     * @param string $theme
     * @return string
     */
    public function getThemePath($theme = null)
    {
        $theme = $theme ?: $this->name;
        return base_path("cms/themes/{$theme}");
    }

    /**
     * Get all available themes.
     *
     * @return array
     */
    public function all()
    {
        $themes = [];
        $themesPath = base_path('cms/themes');

        if (!File::exists($themesPath)) {
            return $themes;
        }

        $directories = File::directories($themesPath);

        foreach ($directories as $directory) {
            $name = basename($directory);
            $themes[$name] = $this->loadThemeInfo($name);
        }

        return $themes;
    }

    /**
     * Check if a theme exists.
     *
     * @param string $theme
     * @return bool
     */
    public function exists($theme)
    {
        return File::exists($this->getThemePath($theme));
    }

    /**
     * Activate a theme and set it as the system default.
     *
     * @param string $theme
     * @return bool
     */
    public function activate($theme)
    {
        if (!$this->exists($theme)) {
            return false;
        }

        // Update the active theme in settings file
        $settingsPath = storage_path('app/theme_settings.json');
        $settings = [];

        if (File::exists($settingsPath)) {
            $settings = json_decode(File::get($settingsPath), true) ?? [];
        }

        $settings['active_theme'] = $theme;
        
        // Create directory if it doesn't exist
        $dir = storage_path('app');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        
        File::put($settingsPath, json_encode($settings, JSON_PRETTY_PRINT));
        
        // Also update the current session
        session(['selected_theme' => $theme]);
        
        // Reset the current theme instance
        $this->name = $theme;
        $this->path = $this->getThemePath($theme);
        $this->config = $this->loadConfig();
        
        return true;
    }

    /**
     * Set the current theme temporarily (for the current session only).
     *
     * @param string $theme
     * @return $this
     */
    public function setTemporary($theme)
    {
        if ($this->exists($theme)) {
            session(['selected_theme' => $theme]);
            
            // Update current instance
            $this->name = $theme;
            $this->path = $this->getThemePath($theme);
            $this->config = $this->loadConfig();
        }
        
        return $this;
    }

    /**
     * Get the active theme.
     *
     * @return string
     */
    public function getActive()
    {
        // First check session for temporary theme selection
        if (session()->has('selected_theme')) {
            $sessionTheme = session('selected_theme');
            if ($this->exists($sessionTheme)) {
                return $sessionTheme;
            }
        }
        
        // Otherwise use the stored theme from settings
        $settingsPath = storage_path('app/theme_settings.json');
        
        if (File::exists($settingsPath)) {
            $settings = json_decode(File::get($settingsPath), true);
            $storedTheme = $settings['active_theme'] ?? config('themes.default', 'theme1');
            
            // Verify the theme exists
            if ($this->exists($storedTheme)) {
                return $storedTheme;
            }
        }
        
        // Fallback to default theme
        return config('themes.default', 'theme1');
    }

    /**
     * Load theme configuration.
     *
     * @return array
     */
    protected function loadConfig()
    {
        $configPath = $this->path . '/config.php';
        
        if (File::exists($configPath)) {
            return require $configPath;
        }

        return [];
    }

    /**
     * Load theme information from theme.json.
     *
     * @param string $theme
     * @return array
     */
    public function loadThemeInfo($theme)
    {
        $path = $this->getThemePath($theme) . '/theme.json';
        
        if (File::exists($path)) {
            return json_decode(File::get($path), true);
        }

        return [
            'name' => $theme,
            'description' => 'No description available',
            'version' => '1.0.0',
            'author' => 'Unknown',
        ];
    }

    /**
     * Get a theme asset path.
     *
     * @param string $path
     * @return string
     */
    public function asset($path)
    {
        $themePath = str_replace(base_path('public'), '', $this->getThemePath($this->name));
        return asset("cms/themes/{$this->name}/assets/{$path}");
    }

    /**
     * Render a theme view.
     *
     * @param string $view
     * @param array $data
     * @return \Illuminate\View\View
     */
    public function view($view, $data = [])
    {
        // Add theme view paths to the loader
        View::addNamespace('theme', $this->getThemePath($this->name) . '/views');
        
        // Merge the theme assets with the view data
        $data = array_merge($data, [
            'theme_assets' => $this->assets,
            'theme_breadcrumbs' => $this->breadcrumbs,
        ]);
        
        return view("theme::{$view}", $data);
    }

    /**
     * Get the theme configuration value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function config($key, $default = null)
    {
        $keys = explode('.', $key);
        $config = $this->config;

        foreach ($keys as $segment) {
            if (!isset($config[$segment])) {
                return $default;
            }
            $config = $config[$segment];
        }

        return $config;
    }

    /**
     * Add a CSS file to the theme.
     *
     * @param string $path
     * @param array $attributes
     * @param string $location
     * @return $this
     */
    public function addStyle($path, $attributes = [], $location = 'header')
    {
        $this->assets['styles'][$location][] = [
            'path' => $this->asset($path),
            'attributes' => $attributes,
        ];

        return $this;
    }

    /**
     * Add a JS file to the theme.
     *
     * @param string $path
     * @param array $attributes
     * @param string $location
     * @return $this
     */
    public function addScript($path, $attributes = [], $location = 'footer')
    {
        $this->assets['scripts'][$location][] = [
            'path' => $this->asset($path),
            'attributes' => $attributes,
        ];

        return $this;
    }

    /**
     * Add inline CSS to the theme.
     *
     * @param string $css
     * @param string $location
     * @return $this
     */
    public function addInlineStyle($css, $location = 'header')
    {
        $this->assets['inline_styles'][$location][] = $css;

        return $this;
    }

    /**
     * Add inline JS to the theme.
     *
     * @param string $js
     * @param string $location
     * @return $this
     */
    public function addInlineScript($js, $location = 'footer')
    {
        $this->assets['inline_scripts'][$location][] = $js;

        return $this;
    }

    /**
     * Get the theme's assets.
     *
     * @return array
     */
    public function getAssets()
    {
        return $this->assets;
    }

    /**
     * Add a breadcrumb item.
     *
     * @param string $label
     * @param string $url
     * @return $this
     */
    public function addBreadcrumb($label, $url = null)
    {
        $this->breadcrumbs[] = [
            'label' => $label,
            'url' => $url,
        ];

        return $this;
    }

    /**
     * Get the theme's breadcrumbs.
     *
     * @return array
     */
    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }

    /**
     * Register theme routes.
     *
     * @return void
     */
    public function registerRoutes()
    {
        $routesPath = $this->path . '/routes.php';
        
        if (File::exists($routesPath)) {
            Route::group([
                'middleware' => ['web'],
                'namespace' => 'Theme\\' . ucfirst($this->name) . '\\Controllers',
                'as' => 'theme.' . $this->name . '.',
            ], function () use ($routesPath) {
                require $routesPath;
            });
        }
    }

    /**
     * Get merged settings from common and theme-specific settings
     *
     * @return array
     */
    public function getMergedSettings()
    {
        // Get common settings
        $commonSettings = $this->getCommonSettings();
        
        // Get theme-specific settings
        $themeSettings = $this->getThemeSettings();
        
        // Merge settings
        return array_merge($commonSettings, $themeSettings);
    }

    /**
     * Get common settings
     *
     * @return array
     */
    public function getCommonSettings()
    {
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);
        
        return array_filter($sections, function($section) {
            return isset($section['common']) && $section['common'] === true;
        });
    }

    /**
     * Get theme-specific settings
     *
     * @return array
     */
    public function getThemeSettings()
    {
        $themeSettingsPath = $this->path . '/settings.json';
        
        if (!File::exists($themeSettingsPath)) {
            return [];
        }
        
        return json_decode(file_get_contents($themeSettingsPath), true);
    }

    /**
     * Get all settings for the frontend management
     *
     * @return array
     */
    public function getAllSettings()
    {
        return $this->getMergedSettings();
    }

    /**
     * Get content specific to the current theme or common content
     *
     * @param string $key
     * @return mixed
     */
    public function getContent($key)
    {
        $settings = $this->getMergedSettings();
        
        if (!isset($settings[$key])) {
            return null;
        }
        
        $contentType = isset($settings[$key]['content']) ? 'content' : 'element';
        $dataKeys = $key . '.' . $contentType;
        
        return \App\Models\Frontend::where('data_keys', $dataKeys)->first();
    }
} 