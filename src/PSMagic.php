<?php

namespace PandaStudios\PSEnv;

use PandaStudios\PSEnv\PSEnvContent;
use PandaStudios\PSEnv\PSEnvAssets;

class PSMagic
{
    public function __construct()
    {
        $this->view         = \base_path().DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views';
        $this->controller   = \base_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'Controllers';
        $this->model        = \base_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Models';
        $this->styleAssets  = $this->view.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'styles';
        $this->scriptAssets = $this->view.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'scripts';
        $this->web          = \base_path().DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'web.php';
    }

    public function createView($view, $layout='app')
    {
        $view = \explode('.', $view);

        // blade title and assets
        $title = \ucfirst(end($view));
        $asset = \implode('.', $view);
        
        // To filter the dots (.) from the string
        \array_filter($view);

        // If the view is not in sub directory e.g view>folder_1>folder_x>...>blade file name
        if(count($view) == 1)
        {
            // blade directory path
            $blade_filename = $this->view.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view).'.blade.php';

            if(!\file_exists($blade_filename))
            {
                // Create the blade file inside the sub directory folder(s) 
                $blade_file = \fopen($blade_filename, 'w+');
                
                // Load the blade file content
                $PSEnvContent = new PSEnvContent();
                \fwrite($blade_file, $PSEnvContent->view($title, $asset, $layout));

                return 'view status .... success';
            }
            else
            {
                return 'view status .... already exists';
            }
        }
        // If the view is in sub directory e.g view>folder_1>folder_x>...>blade file name
        else
        {
            // blade directory path
            $blade_filename = $this->view.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view).'.blade.php';
            
            array_pop($view);
            
            // Sub directory path
            $view_path = $this->view.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view);

            // Check if sub directory is exists
            if(!\file_exists($view_path))
            {
                // Create the sub directory folder(s)
                \mkdir($view_path, 0777, true);
            }

            // Check if blade file is exists
            if(!\file_exists($blade_filename))
            {
                // Create the blade file inside the sub directory folder(s) 
                $blade_file = \fopen($blade_filename, 'w+');
                
                // Load the blade file content
                $PSEnvContent = new PSEnvContent();
                \fwrite($blade_file, $PSEnvContent->view($title, $asset, $layout));
    
                return 'view status .... success';
            }
            else
            {
                return 'view status .... already exists';
            }
        }
    }

    public function createStyleAssets($view)
    {
        $view = \explode('.', $view);
        
        // To filter the dots (.) from the string
        \array_filter($view);

        // If the view is not in sub directory e.g view>folder_1>folder_x>...>blade file name
        if(count($view) == 1)
        {
            // blade directory path
            $blade_filename = $this->styleAssets.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view).'.blade.php';

            // Check if blade file is exists
            if(!\file_exists($blade_filename))
            {
                // Create the blade file inside the sub directory folder(s) 
                $blade_file = \fopen($blade_filename, 'w+');
                
                // Load the blade file content
                $PSEnvAssets = new PSEnvAssets();
                \fwrite($blade_file, $PSEnvAssets->styles());
    
                return 'styles assets status .... success';
            }
            else
            {
                return 'styles assets status .... already exists';
            }
        }
        // If the view is in sub directory e.g view>folder_1>folder_x>...>blade file name
        else
        {
            // blade directory path
            $blade_filename = $this->styleAssets.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view).'.blade.php';

            array_pop($view);
            
            // Sub directory path
            $style_assets_path = $this->styleAssets.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view);
            
            // Check if sub directory is exists
            if(!\file_exists($style_assets_path))
            {
                // Create the sub directory folder(s)
                \mkdir($style_assets_path, 0777, true);
            }

            // Check if blade file is exists
            if(!\file_exists($blade_filename))
            {
                // Create the blade file inside the sub directory folder(s) 
                $blade_file = \fopen($blade_filename, 'w+');
                
                // Load the blade file content
                $PSEnvAssets = new PSEnvAssets();
                \fwrite($blade_file, $PSEnvAssets->styles());
    
                return 'styles assets status .... success';
            }
            else
            {
                return 'styles assets status .... already exists';
            }
        }
    }

    public function createScriptAssets($view)
    {
        $view = \explode('.', $view);
        
        // To filter the dots (.) from the string
        \array_filter($view);

        // If the view is not in sub directory e.g view>folder_1>folder_x>...>blade file name
        if(count($view) == 1)
        {
            // blade directory path
            $blade_filename = $this->scriptAssets.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view).'.blade.php';

            // Check if blade file is exists
            if(!\file_exists($blade_filename))
            {
                // Create the blade file inside the sub directory folder(s) 
                $blade_file = \fopen($blade_filename, 'w+');
                
                // Load the blade file content
                $PSEnvAssets = new PSEnvAssets();
                \fwrite($blade_file, $PSEnvAssets->scripts());
    
                return 'scripts assets status .... success';
            }
            else
            {
                return 'scripts assets status .... already exists';
            }
        }
        // If the view is in sub directory e.g view>folder_1>folder_x>...>blade file name
        else
        {
            // blade directory path
            $blade_filename = $this->scriptAssets.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view).'.blade.php';

            array_pop($view);
            
            // Sub directory path
            $style_assets_path = $this->scriptAssets.DIRECTORY_SEPARATOR.\implode(DIRECTORY_SEPARATOR, $view);
            
            // Check if sub directory is exists
            if(!\file_exists($style_assets_path))
            {
                // Create the sub directory folder(s)
                \mkdir($style_assets_path, 0777, true);
            }

            // Check if blade file is exists
            if(!\file_exists($blade_filename))
            {
                // Create the blade file inside the sub directory folder(s) 
                $blade_file = \fopen($blade_filename, 'w+');
                
                // Load the blade file content
                $PSEnvAssets = new PSEnvAssets();
                \fwrite($blade_file, $PSEnvAssets->scripts());
    
                return 'scripts assets status .... success';
            }
            else
            {
                return 'scripts assets status .... already exists';
            }
        }
    }

    public function web($controller = false, $view)
    {
        $view = \explode('.', $view);
        
        // To filter the dots (.) from the string
        \array_filter($view);

        if($controller != false)
        {
            echo 'web with controller';
        }
        else
        {
            // get url and path for web.php
            $url  = implode('/', $view);
            $path = implode('.', $view);

            $web_content = <<<EOT
            
            Route::get('$url', function(){
                return view('$path');
            });\n
            EOT;

            $web_file = \fopen($this->web, 'a');
            \fwrite($web_file, $web_content);

            return 'web.php status .... success';
        }
    }
}