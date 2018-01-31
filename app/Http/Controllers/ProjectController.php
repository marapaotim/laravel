<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use ZanySoft\Zip\ZipManager;
use Zip;

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

    public function get_files(Request $request){ 

        $base64string =  $request->input('files');

        $filename = $request->input('filename');

        file_put_contents('./import/'.$filename, base64_decode(explode(',',$base64string)[1]));

        $this->extract_zip_file('./import/'.$filename);

        return response()->json(['file'=>$request->input('files')]);
    }

     function extract_zip_file($linkZip){
        $zip = Zip::open($linkZip); 
        $zip->extract('./apps/'); 
    }

    public function create_projects(Request $request){
        try{
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->input('folder_name')))
            {
                return response()->json(['status'=>'Special Characters are invalid for creating project!']);
            }
            if (!is_dir('./apps/'.$request->input('folder_name'))) {
                mkdir('./apps/'.$request->input('folder_name'), 0777, true);
                return response()->json(['status'=>'Project Successfully Created']);
            }
            else
            {
                return response()->json(['status'=>'Error! Project Already Exists']);
            }
        }catch (Exception $e)
        {
             return response()->json(['status'=>'Caught exception: ',  $e->getMessage(), "\n"]); 
        } 
    }
}