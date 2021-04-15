
<?php 
    class AllDataPage  {
        
        private $_db = null;
            public function __construct() {
                $this->_db = DB::getInstanse();
            }
        
        public function allData(){
            $result = $this->_db->query('SELECT nir.name, cat.cat_name, groupe.groupe_name FROM `nir` 
                                        JOIN cat ON nir.id_cat = cat.id 
                                        JOIN groupe ON nir.id_groupe = groupe.id ');
            $all = $result->fetchAll(PDO::FETCH_ASSOC);
            $allData = '';
            foreach($all as $opt => $key){
        
            $tableAll = '';
            $allData .=  "
                            <tr>
                                <th>{$key['name']}</th>
                                <td>{$key['cat_name']}</td>
                                <td>{$key['groupe_name']}</td>
                            </tr>
                            ";
            }
            $tableAll = "
                <table cellspacing='2' border='1' style='width:100%;'>
                <thead>
                    <tr>
                        <th scope='col'>Наименование</th>
                        <th scope='col'>Категория</th>
                        <th scope='col'>Группа</th>
                    </tr>
                </thead>
                <tbody>
                    {$allData}
                </tbody>
                </table>
                ";
            return $tableAll;

        }
        
    }
    