<?php

namespace Engine\Core\Template;

class Theme{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    /**
     * Url current theme
     * @var string
     */
    public $url = '';

    protected $data = [];

    /**
     * @param [type] $name
     * @return void
     */
    public function header($name = null){
        $name = (string) $name;
        $file = 'header';

        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this->loadTemplateFile($file);
    }
    
    /**
     * @param string $name
     * @return void
     */
    public function footer($name = ''){
        $name = (string) $name;
        $file = 'footer';
    
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
    
        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @return void
     */
    public function sidebar($name = ''){
        $name = (string) $name;
        $file = 'sidebar';
    
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
    
        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @param array $data
     * @return void
     */
    public function block($name = '', $data = []){
        $name = (string) $name;
    
        if($name !== ''){
            $this->loadTemplateFile($file, $data);
        }
    }

    /**
     * @param [type] $nameFile
     * @param array $data
     * @return void
     */
    private function loadTemplateFile($nameFile, $data = [])
    {
        if (ENV == 'Admin') {
            $templateFile = ROOT_DIR . '/View/' . $nameFile . '.php';
        }
            
        if (is_file($templateFile)) {
            extract(array_merge($data, $this->data));
            require_once $templateFile;
        }
        else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }

    /**
     * @return array
     */
    public function getData(){
        return $this->data;
    }

    /**
     * @param [type] $data
     */
    public function setData($data){
        $this->data = $data;
    }

    
}

?>