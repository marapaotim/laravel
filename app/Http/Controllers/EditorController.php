<?php 
namespace App\Http\Controllers;
use App\includes\TVTeditor;
use App\Includes\Editor;
use Illuminate\Http\Request;
use ZanySoft\Zip\ZipManager;
use Zip;

//include(app_path().'includes/TVTeditor.php');
//header('Content-Type: application/json');

class EditorController extends Controller
{   
	private $editor; 
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
    { 
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

    public function tvt_editor(Request $request, $results = array()){
	    $results = $this->ed($request->input('dir'), $results); 
		return response()->json($results); 
    }

    function ed($dir, $results = array()){
    	//if(!is_dir($dir)){ return false; }
    	$files = scandir($dir); 
    	$HELLO = new Editor();
	    foreach($files as $key => $value){
	        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
	        $name = explode("\\", $path);
	        if(!is_dir($path)) {
	        	$ext = pathinfo(last($name), PATHINFO_EXTENSION);
	        	switch (strtolower($ext)) {
	        		case 'css':
	        		case 'html':
	        		case 'php':
	        		case 'txt':
	        		case 'xml': 
	        		case 'js': 
	        		case 'tpl':  
	            		$results[] =  array('name' => last($name), 'path'	=> $path, 'asdsad' => $HELLO->asd());
	        		break;
	        		default: 
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
    	    $file   = fopen($request->input('path'), "w"); 
		    $pieces = str_split($request->input('content'), 1024 * 4);
		    foreach ($pieces as $piece) {
		        fwrite($file, $piece, strlen($piece));
		    } 
		    fclose($file); 
    		return response()->json(['status'=>'Successfully Saved']);
    }

    public function get_files(Request $request){   
		$base64string =  $request->input('files');
		$filename_2 = preg_replace('/\s+/', '', $request->input('filename'));

		file_put_contents('./import/'.$filename_2, base64_decode(explode(',',$base64string)[1]));

		$this->extract_zip_file('./import/'.$filename_2, $request->input('project_fold'));
    	return response()->json(['file'=>$this->folders_zip('./import/'.$filename_2)]);
    }
    function extract_zip_file($linkZip, $project_fold){

    	$zip = Zip::open($linkZip); 

    	$zip->extract('./apps/'.$project_fold.'/'); 
    }

    function folders_zip($linkZip){

    	$zip = Zip::open($linkZip);

    	$zipfile = array();

    	$zipfile = $zip->listFiles();

    	$folder_zip = array();

    	$folder_zip = explode("/", $zipfile[0]);

		return $folder_zip[0]; 
    }

    public function export_project(Request $request){

    	$path_project = array(
    		'folder_path' => $request->input('project_path'), 
    	);

    	if (file_exists($path_project['folder_path'] . '.zip')) {

    		unlink($path_project['folder_path'] . '.zip');

		}

    	$project_name = explode("\\", $path_project['folder_path']);

    	$zip = Zip::create($path_project['folder_path'].'.zip');

    	$zip->add($path_project['folder_path'], last($project_name)); 

    	return response()->json([
    		'file_rar' => 'http://localhost:8000' . str_replace('.','',$path_project['folder_path']) . '.zip']
    	);
    }
}