<?php
namespace comfpl;

class FPLGlobal {
    public static $namespace = "teamup\\Controllers\\";
    public static $default_route = "general-home-index.do";
    public static $view_bag;
    public static $view_result;
    public static $action_result;
    public static $theme = "default";

    public static function render_bundle_css() {
        // À compléter plus tard – pour l'instant rien
    }
    public static function render_bundle_script() {
        // À compléter plus tard
    }
    public static function add_bundle($name, $bundle) {}
    public static function get_theme_uri() {
        return "themes/" . self::$theme;
    }
    public static function get_action($route, $default) {
        // Décodage simplifié : zone-controleur-action.do
        $parts = explode('/', trim(parse_url($route, PHP_URL_PATH), '/'));
        $last = end($parts);
        $action = str_replace('.do', '', $last);
        $zone = $parts[count($parts)-2] ?? 'general';
        $controller = $parts[count($parts)-3] ?? 'home';
        return compact('zone', 'controller', 'action');
    }
    public static function get_request_data() {
        return (object) array_merge($_GET, $_POST);
    }
    public static function process_result($target_action) {
        $controllerClass = self::$namespace . $target_action['zone'] . '\\' . $target_action['controller'] . 'Controller';
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            $model = self::get_request_data();
            self::$action_result = $controller->{$target_action['action']}($model);
            if (self::$action_result instanceof \comfpl\views\PartialViewResult) {
                echo self::$action_result->content;
            } elseif (self::$action_result instanceof \comfpl\views\JsonResult) {
                header('Content-Type: application/json');
                echo self::$action_result->json_data;
            } elseif (self::$action_result instanceof \comfpl\views\ViewResult) {
                self::$view_result = self::$action_result;
                $viewFile = __DIR__ . "/../application/views/{$target_action['zone']}/{$target_action['action']}.php";
                if (file_exists($viewFile)) {
                    ob_start();
                    require $viewFile;
                    self::$view_result->content = ob_get_clean();
                    require __DIR__ . "/../application/views/_mainLayout.php";
                }
            }
        }
    }
    public static function get_user_identity() {
        // Version minimale – à améliorer plus tard
        static $identity = null;
        if (!$identity) {
            $identity = new \stdClass();
            $identity->is_authenticated = false;
            $identity->display_name = "Invité";
            $identity->login = "";
        }
        return $identity;
    }
}