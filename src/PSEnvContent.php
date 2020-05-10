<?php

namespace PandaStudios\PSEnv;

class PSEnvContent
{
    public function model()
    {
        # code...
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