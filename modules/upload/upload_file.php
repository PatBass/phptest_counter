<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 5/27/14
 * Time: 8:11 PM
 */

$errors = array();

if(isset($_FILES['file']))
{
    if($_FILES['file']['error'] == 0)
    {
        if($_FILES['file']['size']<= 1000000)
        {
            $fileinfo = pathinfo($_FILES['file']['name']);
            $extension_upload = $fileinfo['extension'];
            $allowed_extensions = array('doc', 'pdf', 'txt');

            if (in_array($extension_upload, $allowed_extensions))
            {
                $upload = new Upload();
                $upload->setExtension($extension_upload);
                $upload->increaseHits();

                if($upload_manager->count($upload->getIp()))
                {
                    return;
                } else {
                    $upload_manager->add($upload);
                }

                $filename = 'uploads/'.$upload->getId().'.'.strtolower($extension_upload);
                if(move_uploaded_file($_FILES['file']['tmp_name'], $filename))
                {

                    $upload->setFile($filename);

                    include_once 'views/counter_display.php';
                }
                else
                {
                    $errors[]="Couldn't transfer the file";
                }

            }
            else
            {
                $errors[]="Only .doc, .pdf and .txt files are allowed";
            }
        }
    }
} else {
    include_once "views/upload_file_view.php";
}

