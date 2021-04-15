<?php 

    class Home extends Controller {
        
        public function index() {
            $date = $this->model('HomePage');
            $forward = $date->catName();
            $this->view('home/index', $forward);
        }
        

    }