<?php

namespace App\Core;

class View
{
    /**
     * Render a view wrapped in a layout.
     *
     * @param string $view   e.g. 'home' or 'admin/dashboard'
     * @param array  $data   Variables extracted into the view
     * @param string $layout e.g. 'main' or 'admin'
     */
    public static function render(string $view, array $data = [], string $layout = 'main'): void
    {
        // Common data available in every view
        $data['_auth']        = Auth::user();
        $data['_flash_success'] = Session::getFlash('success');
        $data['_flash_error']   = Session::getFlash('error');
        $data['_flash_info']    = Session::getFlash('info');

        extract($data, EXTR_SKIP);

        $viewFile = ROOT . "/src/Views/{$view}.php";
        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo "View not found: {$view}";
            return;
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        $layoutFile = ROOT . "/src/Views/layouts/{$layout}.php";
        if (!file_exists($layoutFile)) {
            echo $content;
            return;
        }

        require $layoutFile;
    }
}
