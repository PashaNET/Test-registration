<?php

    $path = "uploads/";
    $valid_formats = array("png", "gif","jpeg");

    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_FILES['foto']['name'];
            $size = $_FILES['foto']['size'];
            if(strlen($name)){
                list($txt, $ext) = explode(".", $name);
                if(in_array($ext, $valid_formats)){
                    if($size<(1024*5121)){
                         $actual_image_name = time().".".$ext;
                         $fileName = $_FILES['foto']['tmp_name'];
                        if(move_uploaded_file($fileName, $path.$actual_image_name)){
                            echo json_encode($path.$actual_image_name);
                         }else{
                            echo json_encode("Error with upload");
                         }
                     }else{
                        echo json_encode("File size is bigger than 5 MB!");
                    }
                }else{
                    echo json_encode("Wrong image format!");
                }
            }

            exit;
    }

