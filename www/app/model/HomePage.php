
<?php 
    class HomePage  {
        
        private $_db = null;
            public function __construct() {
                $this->_db = DB::getInstanse();
            }
        
        public function catName(){
            $result = $this->_db->query('SELECT * FROM `cat`');
            $cat = $result->fetchAll(PDO::FETCH_ASSOC);
            $catOpt = '';
            foreach($cat as $opt => $key){
                $catOpt .= '<option value ="'.$key["id"].'">'.$key["cat_name"].'</option>';
            }

            $result = $this->_db->query('SELECT * FROM `groupe`');
            $groupe = $result->fetchAll(PDO::FETCH_ASSOC);
            $groupeOpt = '';
            foreach($groupe as $opt => $key){
                $groupeOpt .= '<option value ="'.$key["id"].'">'.$key["groupe_name"].'</option>';
            }

            $opt = [$catOpt,$groupeOpt];
            return $opt;
        }
        
    }
    