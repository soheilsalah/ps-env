<?php

namespace PandaStudios\PSEnv;

class PSEnvAssets
{
    public function styles()
    {
        $style_content = <<<EOT
        <link rel="stylesheet" href="">
        <style>\n
        </style>
        EOT;

        return $style_content;
    }

    public function scripts()
    {
        $script_content = <<<EOT
        <script src=""></script>
        <script>
        
        </script>
        EOT;

        return $script_content;
    }
}