<?php 

    class AllData extends Controller {
        
        public function index() {
            $alldata = $this->model('AllDataPage');
            $forward = $alldata->allData();
            $this->view('allData/index', $forward);
        }
       

    }