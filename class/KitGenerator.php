<?php 
namespace App\Core;

require ROOT.'/class/ZipHelper.php';

class KitGenerator
{
    private $_html;
    private $_images;
    function __construct($domain, $zip_filename)
    {        
        $this->zip_filename = $zip_filename;
        if (!file_exists(ROOT.'/files')) {
            mkdir(ROOT.'/files', 0777, true);
        }
        $folder = GeneralHelper::generateRandomString();
        $this->kit_folder = ROOT.'/files/'.$folder;
        $this->save_folder = 'files/'.$folder;
        $this->_html = '';
        $this->_images = '';
        $this->domain = $domain;
    }

    public function quickopen()
    {
        $file_path = $this->kit_folder.'/'."index.html";        
        if (!file_exists($file_path)) {            
            die("Unable to open file!");
        }
        $this->_html = file_get_contents($file_path);
        $this->_images = '';
        return $this;
    }

    public function scan()
    {
        $this->quickopen();
        if (preg_match_all('~src\s*=\s*?["\'](.*?)["\']{1}|url\s*\(\s*[\'"\)]*\s*([^ ].*?)[ \'"\)]|background\s*=\s*?["\'](.*?)["\']{1}~im', $this->_html, $this->images)) {
            $this->replaceAll();
        }        
    }

    public function replaceAll()
    {
        // Get img and background images, then remove empty values and doublons
        $matches = array_unique(array_filter(array_merge($this->images[1], $this->images[2], $this->images[3])));        
        foreach ($matches as $key => $match) {
            /* Debug */
            // echo ($key+1).' => ';
            // print_r($match);
            // echo '<br>';
            /* End debug */
            $new_match_value = preg_replace('~\.+/~', '', $match);
            $this->_html = preg_replace("~$match~", $this->domain.'/'.$this->save_folder.'/'.$new_match_value, $this->_html);
        }
    }

    public function getHtml()
    {
        return $this->_html;
    }

    // public function setHtml($new_value)
    // {
    //     $this->_html = $new_value;
    // }

    public function process()
    {        
        $zip_helper = new ZipHelper($this->zip_filename);
        $zip_helper->unzip($this->kit_folder);        
        $this->scan();       
    }
}