<?php

namespace App\Handlers;

class LfmConfigHandler extends \Unisharp\Laravelfilemanager\Handlers\ConfigHandler
{
    public function userField()
    {
        return auth()->user()->username;
    }
}
