<?php
class FPLGlobal
{
    public static $theme = "default";
    private static $bundles = [];

    public static function add_bundle($name, $bundle)
    {
        self::$bundles[$name] = $bundle;
    }

    public static function render_bundle_css()
    {
        if (isset(self::$bundles['bootstrap'])) {
            foreach (self::$bundles['bootstrap']->css_set as $css) {
                echo '<link rel="stylesheet" href="' . $css->url . '">' . "\n";
            }
        }
    }

    public static function render_bundle_script()
    {
        if (isset(self::$bundles['bootstrap'])) {
            foreach (self::$bundles['bootstrap']->script_set as $script) {
                echo '<script src="' . $script->url . '"></script>' . "\n";
            }
        }
    }

    public static function get_theme_uri()
    {
        return "../application/themes/" . self::$theme;
    }
}
