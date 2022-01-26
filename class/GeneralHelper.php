<?php 
namespace App\Core;

class GeneralHelper
{
    public static function generateRandomString($n = 11)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
  
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }  
        return $randomString;
    }

    public static function upload($input_name = "file-to-upload")
    {
        if (!file_exists(ROOT.'/zip')) {            
            mkdir(ROOT.'/zip', 0777, true);
        }
        $target_dir = ROOT."/zip/";
        $target_file = $target_dir . 'uploaded_zip.zip';
        // basename($_FILES[$input_name]["name"])
        $upload_ok = 1;
        $image_file_Type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image        
        if(isset($_POST["submit"])) {
            $filename = $_FILES[$input_name]["tmp_name"];
            /* Debug */
            // echo 'Filename: '.$filename.'<br>';
            // echo 'Target directory: '.$target_dir.'<br>';
            // echo 'Target filename: '.$target_file.'<br>';
            if($image_file_Type != 'zip') {
                echo 'Sorry, only zip file allowed';
                $upload_ok = 0;
            }
            // Check if $uploadOk is set to 0 by an error            
            if ($upload_ok == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($filename, $target_file)) {                    
                    // echo '<p class="alert alert-success"> The file '. htmlspecialchars( basename( $_FILES[$input_name]["name"])). " has been uploaded.</p>";
                    return $target_file;
                } else {
                    echo '<p class="alert alert-danger">Sorry, there was an error uploading your file.</p>';
                }
            }
        }
    }
}