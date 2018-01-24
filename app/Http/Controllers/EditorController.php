<?php 
namespace App\Http\Controllers;
use App\includes\TVTeditor;
use App\Includes\Editor;
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
    	$HELLO = new Editor();
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
	        		case 'jpeg':  
	        		break;
	        		default:
	            	$results[] =  array('name' => last($name), 'path'	=> $path, 'asdsad' => $HELLO->asd());  
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
    		//$this->fwrite_stream($request->input('path'), $request->input('content'));
    	    $file   = fopen($request->input('path'), "w"); 
		    $pieces = str_split($request->input('content'), 1024 * 4);
		    foreach ($pieces as $piece) {
		        fwrite($file, $piece, strlen($piece));
		    } 
		    fclose($file); 
    		return response()->json(['status'=>'Successfully Saved']);
    }

 //    function fwrite_stream($fp, $string) {
	//     for ($written = 0; $written < strlen($string); $written += $fwrite) {
	//         $fwrite = fwrite($fp, substr($string, $written));
	//         if ($fwrite === false) {
	//             return $written;
	//         }
	//     }
	//     return $written;
	// }
}