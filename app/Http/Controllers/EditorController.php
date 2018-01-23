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
	        	$ext = pathinfo(last($name), PATHINFO_EXTENSION);
	        	switch (strtolower($ext)) {
	        		case 'png':
	        		case 'jpg':
	        		case 'gif':
	        		case 'ico':
	        		case 'bmp':
	        		case 'ppm': 
	        		case 'jpeg': 
	        		case 'pmb':
	        		case 'pgm':
	        		case 'pbm':
	        		case 'pnm':
	        		case 'tiff':
	        		case 'exif':
	        		case 'svg':
	        		case 'eot':
	        		case 'woff':
	        		case 'woff2':
	        		case 'ttf':
	        		break;
	        		default:
	            	$results[] =  array('name' => last($name), 'path'	=> $path);  
	        		break;
	        	}
	        } else if($value != "." && $value != "..") {
	        	//$rret = $results[last($name)];
	            $results[last($name)] = array();
	            $results[last($name)] =  $this->ed($path, $results[last($name)]); 
	        }
	    }   

	    return $results;
    }

    public function save_content_file(Request $request){
    	file_put_contents($request->input('path'), $request->input('content'));
    	return response()->json(['status'=>$request->input('path')]);
    }
}