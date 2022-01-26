<?php 
namespace App\Core;

class ZipHelper {
    function __construct($filename)
    {
        $this->zip = new \ZipArchive;
        $this->filename = $filename;
    }

    function upload()
    {
        
    }
    
    public function unzip($dest_path = 'kits')
    {
        // Zip File Name        
        if ($this->zip->open($this->filename) === TRUE) {        
            // Unzip Path
            $this->zip->extractTo($dest_path);
            $this->zip->close();            
        } else {
            echo '<p class="alert alert-danger">Unzipped Process failed</p><br>';
        }
    }
}