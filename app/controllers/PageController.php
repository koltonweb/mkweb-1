<?php

namespace app\controllers;

class PageController extends AppController
{
   
    public function indexAction()
    {
        if (isset($_GET['id']) && $_GET['id'] == 1) {
            $this->layout = 'yoga';
            $this->view = 'indexyoga';
        }

        if (isset($_GET['id']) && $_GET['id'] == 2) {
            $this->layout = 'gootscard';
            $this->view = 'indexcard';
        }

        if (isset($_GET['id']) && $_GET['id'] == 3) {
            $this->layout = 'paralax';
            $this->view = false;
        }

        if (isset($_GET['id']) && $_GET['id'] == 4) {
            $this->layout = 'firesafety';
            $this->view = 'indexfire';
        }
    }

    
}