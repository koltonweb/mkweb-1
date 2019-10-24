<?php

namespace app\controllers;

use app\models\MainModel;
use mkweb\base\Controller;

class AppController extends Controller
{
    protected $db;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->db = new MainModel();
    }

}
