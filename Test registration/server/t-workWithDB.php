<?php
/**
 *
 */
class WorkWithDatabase{

    private $user = 'root';
    private $password = '123456789';
    private $localhost ='localhost';
    private $database = 'test_task';
    private $isConnected = false;
    private $result = array();
    /**
     * Connect to database, allows only one connect
    */
    public function connect(){
        if(!$this->isConnected){
            $connect = mysql_connect($this->localhost, $this->user, $this->password);
            if($connect){
                $selDB = mysql_select_db($this->database, $connect);
                if($selDB){
                    $this->isConnected = true;
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return true;
        }

    }
    /**
     * DISCONNECT
     */
    public function disconnect(){
        if($this->isConnected){
            mysql_close();
            $this->isConnected = false;
            return true;
        }else{
            return false;
        }
    }
    /**
     * SELECT
     */
    public function select($table, $rows="*", $where=null, $order=null){

        $query = 'SELECT '.$rows.' FROM '.$this->database.'.'.$table;
        if(!$where==null){
            $query .= ' WHERE '.$where;
        }
        if(!$order==null){
           $query .= ' ORDER BY '.$order;
        }

        if($this->tableExists($table)){

            $result = mysql_query($query);

            if($result){
                $numResults = mysql_num_rows($result);
                for($i = 0; $i < $numResults; $i++) {
                    $r = mysql_fetch_array($result);
                    $key = array_keys($r);
                    for($x = 0; $x < count($key); $x++){
                        if(!is_int($key[$x])){
                            if(mysql_num_rows($result) > 1)
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            else if(mysql_num_rows($result) < 1)
                                $this->result = null;
                            else
                                $this->result[$key[$x]] = $r[$key[$x]];
                        }
                    }
                }
                return true;
            }else {
                return false;
            }
        }
    }
    /**
     * INSERT
     */
    public function insert($table, $data){
        if($this->tableExists($table))
        {
            $insert = 'INSERT INTO '.$table;
            $rows = implode(', ', array_keys($data));
            $values = array_values($data);

            for($i = 0; $i < count($values); $i++){
                if(is_string($values[$i]))
                    $values[$i] = '"'.$values[$i].'"';
            }
            $values_with_quotes = implode(', ', $values);

            $insert .= ' ('.$rows.')';
            $insert .= ' VALUES ('.$values_with_quotes.')';
            $ins = mysql_query($insert);

            if($ins){
                return true;
            }
            else{
                return false;
            }
        }

    }
    /**
     * UPDATE
     */
    public function update($table, $rows, $where, $condition){

        if($this->tableExists($table))
        {
            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            for($i = 0; $i < count($rows); $i++){
                if(is_string($rows[$keys[$i]])){
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                }
                else{
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                // Parse to add commas
                if($i != count($rows)-1){
                    $update .= ',';
                }
            }

            $str = '';
            foreach($where as $key=>$value){
                $str.=$key.$condition.$value;
            }
            $update .= ' WHERE '.$str;
            $query = mysql_query($update);
            if($query){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    /**
     * TABLE EXISTS
     */
    private function tableExists($table){
        $inDB = mysql_query('SHOW TABLES FROM '.$this->database.' LIKE "'.$table.'"');
        if($inDB){
           if(mysql_num_rows($inDB)==1){
               return true;
           }else{
               return false;
           }
        }
    }
    /**
     * GET RESULT
     */
    public function getResult(){
        return $this->result;
    }
}