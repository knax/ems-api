<?php

namespace App\Controller\v1;

use App\Controller\BaseController;

class HomepageController extends BaseController
{

    public function index()
    {
        return \Response::json(
            [
                'error' => false,
                'message' => 'welcome ' . \Auth::user()->username
            ]
        );
    }

}
