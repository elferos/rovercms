<?php
namespace Engine\Core\Template;

use Engine\Core\Template\Theme;

class View{
    /**
     * @var \Engine\Core\Template\Theme
     */
    protected $theme;

    /**
     * View conctructor
     */
    public function __construct(){
        $this->theme = new Theme();
    }

    /**
     * @param [type] $template
     * @param array $vars
     * @return void
     */
    public function render($template, $vars = []){
        $templatePath = ROOT_DIR . '\\content\\themes\\default\\' . $template . '.php';

        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }

        $this->theme->setData($vars);

        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try{
            require $templatePath;
        }catch(\Exception $e){
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();
    }
}
?>