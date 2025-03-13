<?php 
    namespace app\core;

    class Controller {
        public function view($view, $data = []) {
            require_once __DIR__ . '/../views/' . $view . '.php';
        }
        public function model($model){
            require_once __DIR__ . '/../models/' . $model . '.php';
            $model = 'app\\models\\' . $model;
            return new $model;
        }
    }