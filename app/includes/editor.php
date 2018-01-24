<?php 
namespace App\Includes;
use Illuminate\Http\Request;
class Editor
{
	public function editor_recursive($dir){  
	$scandirectory = scandir($dir); 
	    // 	foreach ($scanned_directory as $key => $value) { 
		   //  	if (!in_array($value,array(".",".."))) 
		   //    	{  
		   //  		if (is_dir($path . DIRECTORY_SEPARATOR .$value))
		   //  		{  
		   //  			 $array_files[$value] =  array_diff(scandir($path . DIRECTORY_SEPARATOR .$value), array('.', '..'));  
		   //  		} 
		   //  		else
		   //  		{
		   //  			$array_files[] = $value;
		   //  		}
	    // 	} 
    	// }
		return $scandirectory; 
	}
	public function asd(){
		return 'Heasdasd';
	}
}