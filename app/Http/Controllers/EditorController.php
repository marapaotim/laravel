<?php 
namespace App\Http\Controllers;
use App\includes\TVTeditor;

use Illuminate\Http\Request;

//include(app_path().'includes/TVTeditor.php');
//header('Content-Type: application/json');

class EditorController extends Controller
{   
	public function index()
    {
    	//$this->dir = './';
    	//$this->tvteditor = new TVTeditor($this->dir);
        return view('editor');
    }

    public function getXMLfile(){
    	if(request()->ajax()){
	    	$files_array = array( 
	    		"note.xml",
	    		"globalStyles.xml",
	    		"Index.xml",
	    	);
	    	$files_array2 = array();
	    	foreach ($files_array as $key => $value) {
	    		$files_array2[] = array(
	    			'file' => $value,
	    		);
	    	}
			return response()->json($files_array2);
		}
    }

    public function get_content_xml_file(Request $request){
    	if(request()->ajax()){
	    	$xmlfile = file_get_contents($request->input('path'));  
	    	return response()->json($xmlfile);
    	}
    }

    public function tvt_editor(Request $request){ 
    	$dir = "./";  
    	$scanned_directory = scandir($dir);
    	$array_files = array(); 
	    	foreach ($scanned_directory as $key => $value) { 
		    	if (!in_array($value,array(".",".."))) 
		      	{  
		    		if (is_dir($dir . DIRECTORY_SEPARATOR .$value))
		    		{  
		    			 $array_files[$value] =  array_diff(scandir($dir . DIRECTORY_SEPARATOR .$value), array('.', '..'));  
		    		} 
		    		else
		    		{
		    			$array_files[] = $value;
		    		}
	    	} 
    	}
		return response()->json($array_files); 
    }
}