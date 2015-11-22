    <?php
    /**
     *
     */
    include_once('t-workWithDB.php');

    if(!empty($_POST)){
        $db = new WorkWithDatabase();
        $db->connect();

        if($_POST['action']=='select'){
            $userEmail = $_POST['user_email'];
            $db->select('users', '*' , ' email = "'.$userEmail.'"');
            $result = $db->getResult();
            $db->disconnect();
            echo json_encode($result);
        }

        elseif($_POST['action']=='insert'){
            $values = array();
            foreach($_POST as $key=>$value){
                if($key =='confirm' || $key =='action') {
                    continue;
                }
                $values[$key] = stripcslashes($value);
            }
            //$values['pass'] = password_hash($values['pass'], PASSWORD_DEFAULT);//committed because not work on hosting
            $db->insert('users', $values);
            $db->disconnect();
            echo json_encode("Welcome to our site");
        }

        elseif($_POST['action']=='update'){
            $values = array();
            $where = array();
            foreach($_POST as $key => $value){
                if($key =='action') {
                    continue;
                }
                elseif ($key=='id'){
                    $where[$key] = $value;
                    continue;
                }

                $values[$key] = stripcslashes($value);
            }
            $db->update('users', $values, $where, '=');
            $db->disconnect();
            echo json_encode("success");
        }

    }


