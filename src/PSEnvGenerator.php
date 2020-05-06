<?php

namespace PandaStudios\PSEnv;

class PSEnvGenerator
{
    public function createEnv()
    {
        $views_dir = base_path().DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views';
        $includes_dir = $views_dir.DIRECTORY_SEPARATOR.'includes';
        $assets_dir = $includes_dir.DIRECTORY_SEPARATOR.'assets';

        $style_dir = $assets_dir.DIRECTORY_SEPARATOR.'styles';
        $script_dir = $assets_dir.DIRECTORY_SEPARATOR.'scripts';

        $style_file = $assets_dir.DIRECTORY_SEPARATOR.'styles.blade.php';
        $script_file = $assets_dir.DIRECTORY_SEPARATOR.'scripts.blade.php';

        $index        = $views_dir.DIRECTORY_SEPARATOR.'index.blade.php';
        $index_style  = $style_dir.DIRECTORY_SEPARATOR.'index.blade.php';
        $index_script = $script_dir.DIRECTORY_SEPARATOR.'index.blade.php';

        $layouts_dir = $views_dir.DIRECTORY_SEPARATOR.'layouts';
        $app_layout  = $layouts_dir.DIRECTORY_SEPARATOR.'app.blade.php';

        $app_dir = base_path().DIRECTORY_SEPARATOR.'app';
        $controller = $app_dir.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'PagesController.php';

        if(\file_exists($views_dir))
        {
            if(!\file_exists($includes_dir))
            {
                \mkdir($includes_dir);

                if(!\file_exists($assets_dir))
                {
                    \mkdir($assets_dir);

                    if(!\file_exists($style_dir))
                    {
                        \mkdir($style_dir);
                    }

                    if(!\file_exists($script_dir))
                    {
                        \mkdir($script_dir);
                    }

                    if(!\file_exists($style_file))
                    {
                        $style_file_content = fopen($style_file, 'w');
                        \fwrite($style_file_content, $this->stylesBlade());
                    }

                    if(!\file_exists($script_file))
                    {
                        $script_file_content = fopen($script_file, 'w');
                        \fwrite($script_file_content, $this->scriptsBlade());
                    }

                    if(!\file_exists($index_style))
                    {
                        $index_style_content = \fopen($index_style, 'w');
                        \fwrite($index_style_content, $this->indexStyleBlade());
                    }

                    if(!\file_exists($index_script))
                    {
                        $index_script_content = \fopen($index_script, 'w');
                        \fwrite($index_script_content, $this->indexScriptBlade());
                    }
                }
            }

            if(!\file_exists($layouts_dir))
            {
                \mkdir($layouts_dir);

                if(!\file_exists($app_layout))
                {
                    $app_layout_file = fopen($app_layout, 'w');
                    \fwrite($app_layout_file, $this->appLayoutBlade());
                }
            }

            if(!\file_exists($index))
            {
                $index_file = fopen($index, 'w');
                \fwrite($index_file, $this->indexBlade());
            }
        }

        if(!\file_exists($controller))
        {
            $controller_file = fopen($controller, 'w');
            \fwrite($controller_file, $this->indexController());
        }
    }

    private function indexBlade()
    {
        $index_blade_content = <<<EOT
        @extends('layouts.app', [
            'title' => 'Panda Studios',
            'asset' => 'index'
        ])
        
        @section('content')
            <ul class="fly-in-text">
                <li>H</li>
                <li>i</li>
                <li>!</li>
            </ul>
        
            <a href="#" class="enter-button">Welcome to panda studios</a>
        @endsection
        EOT;

        return $index_blade_content;
    }

    public function indexStyleBlade()
    {
        $index_style_blade_content = <<<EOT
        <style> *{margin:0;padding:0}body{font-family:'Open Sans',Arial,sans-serif;font-weight:700}.welcome-section{position:absolute;width:100%;height:100%;top:0;left:0;background-color:#6495ed;overflow:hidden}.welcome-section .content-wrap{position:absolute;left:50%;top:50%;transform:translate3d(-50%,-50%,0)}.welcome-section .content-wrap .fly-in-text{list-style:none}.welcome-section .content-wrap .fly-in-text li{display:inline-block;margin-right:30px;font-size:5em;color:#fff;opacity:1;transition:all 2s ease}.welcome-section .content-wrap .fly-in-text li:last-child{margin-right:0}.welcome-section .content-wrap .enter-button{display:block;text-align:center;font-size:1em;text-decoration:none;text-transform:uppercase;color:#fff;opacity:1;transition:all 1s ease 2s}.welcome-section .content-hiddent .content-wrap .fly-in-text li{opacity:0}.welcome-section .content-hiddent .content-wrap .fly-in-text li:nth-child(1){transform:translate3d(-100px,0,0)}.welcome-section .content-hiddent .content-wrap .fly-in-text li:nth-child(2){transform:translate3d(100px,0,0)}.welcome-section .content-hiddent .content-wrap .enter-button{opacity:0;transform:translate3d(0,-30px,0)}@media (min-width:800px){.welcome-section .content-wrap .fly-in-text li{font-size:10em}.welcome-section .content-wrap .fly-in-text .enter-button{font-size:1.5em}} </style>
        EOT;

        return $index_style_blade_content;
    }

    public function indexScriptBlade()
    {
        $index_style_blade_content = <<<EOT
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function(){
                var welcomeSection = $(".welcome-section"),
                \tenterButton = welcomeSection.find('.enter-button');
                
                setTimeout(function(){
                    welcomeSection.removeClass('content-hidden');
                }, 500);
                
                enterButton.on('click', function(e){
                    e.preventDefault();
                    welcomeSection.addClass('content-hidden').fadeOut();
                });
            });
        </script>
        EOT;

        return $index_style_blade_content;
    }

    private function stylesBlade()
    {
        $style_blade_content = <<<EOT
        @if(isset(\$asset))
            @include('includes.assets.styles.'.\$asset)
        @endif
        EOT;

        return $style_blade_content;
    }

    private function scriptsBlade()
    {
        $script_blade_content = <<<EOT
        @if(isset(\$asset))
            @include('includes.assets.scripts.'.\$asset)
        @endif
        EOT;

        return $script_blade_content;
    }

    private function appLayoutBlade()
    {
        $app_layout_content = <<<EOT
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>
            @isset(\$title)
                {{ \$title }}
            @else
                Your Page title
            @endisset
            </title>
            @include('includes.assets.styles')
        </head>
        <body>
            <div class="welcome-section content-hidden">
                <div class="content-wrap">
                    @yield('content')
                </div>
            </div>\n
            @include('includes.assets.scripts')
        </body>
        </html>
        EOT;

        return $app_layout_content;
    }

    private function indexController()
    {
        $controller_content = <<<EOT
        <?php\n
        namespace App\Http\Controllers;\n
        use Illuminate\Http\Request;\n
        class PagesController extends Controller
        {
            public function index()
            {
                return view('index');
            }
        }
        EOT;

        return $controller_content;
    }
}