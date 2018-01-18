<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
	public function index()
    {
        return view('editor');
    }

    public function getXMLfile(){
    	$path = "note.xml";
		$file = basename($path);         // $file is set to "index.php"
		$file = basename($path, ".xml");
		return  $file.".xml";
    }
}