<?php
namespace App\Controllers;

class Controller
{
    public function render(string $file, array $datas = [])
    {
        extract($datas);
        require_once ROOT.'/Views/'.$file.'.php';
    }

    public function json($data)
    {
        header('Content-Type: application/json; charset=utf-8');       
        echo json_encode(['response' => $data]);
    }
}