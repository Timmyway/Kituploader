<?php namespace App\Controllers;

require ROOT.'/class/GeneralHelper.php';
require ROOT.'/class/KitGenerator.php';
use App\Core\GeneralHelper;
use App\Core\KitGenerator;

class AppController extends Controller {
    public function generateKit()
    {
        $zip_file = GeneralHelper::upload();
        if (!$zip_file) {
            return $this->json(['response' => 'No result']);
        }
        $domain = 'http://localhost/learnphp';
        // $domain = 'http://testim.kontikimedia.fr';
        $kit_generator = new KitGenerator($domain, $zip_file);
        $kit_generator->process();
        $built_kit = $kit_generator->getHtml();
        // include('../views/upload.php');
        // $this->render('result', ['built_kit' => $built_kit]);
        return $this->json($built_kit);
    }

    public function test()
    {
        echo 'Test mode';
        $this->render('home');
    }
}