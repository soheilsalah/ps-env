<?php

namespace PandaStudios\PSEnv;

class PSEnvContent
{
    public function model($namspace='', $classname='')
    {
        $model_content = <<<EOT
        <?php\n
        namespace $namspace\n
        use Illuminate\Database\Eloquent\Model;\n
        class $classname extends Model
        {
            protected \$table = '';
        }
        EOT;

        return $model_content;
    }

    public function view($title, $asset, $layout)
    {
        $blade_content = <<<EOT
        @extends('layouts.$layout', [
            'title' => '$title',
            'asset' => '$asset'
        ])
        
        @section('content')
        
        @endsection
        EOT;

        return $blade_content;
    }

    public function controller()
    {
        # code...
    }

    public function ajaxScripts()
    {
        # code...
    }

    public function dataTable()
    {
        # code...
    }
}