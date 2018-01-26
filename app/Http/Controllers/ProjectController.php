<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function index()
    { 
        return view('projects');
    } 

    public function display_project($dir = './apps/'){
    	$files = scandir($dir); 
    	$folder_list = array();
    	foreach ($files as $key => $value) { 
    		$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
    		if(is_dir($path)){
	    		if($value != '.' && $value != '..'){
	    			$folder_list[] = $value;
	    		}  	
    		}
    	}
    	return response()->json($folder_list); 
    }
}