<?php 
namespace App\Http\Controllers;
use App\includes\TVTeditor;
use App\includes\Editor;
use Illuminate\Http\Request;

//include(app_path().'includes/TVTeditor.php');
//header('Content-Type: application/json');

class EditorController extends Controller
{   
	private $editor; 
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

    public function tvt_editor($dir = './', $results = array()){
	    $results = $this->ed($dir, $results); 
		return response()->json($results); 
    }

    function ed($dir = './', $results = array()){
    	$files = scandir($dir);

	    foreach($files as $key => $value){
	        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
	        $name = explode("\\", $path);
	        if(!is_dir($path)) {
	            $results[] =  array('name' => last($name), 'path'	=> $path);  
	        } else if($value != "." && $value != "..") {
	        	//$rret = $results[last($name)];
	            $results[last($name)] = array();
	            $results[last($name)] =  $this->ed($path, $results[last($name)]); 
	        }
	    }   

	    return $results;
    }
}