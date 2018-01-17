<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use Datatables; 

use DB;
use App\Quotation;

class CarController extends Controller
{
   public function show()
    {
       $cars = DB::select('SELECT * FROM blog.cars;'); 
       return view('cars', ['cars' => $cars]);
    }
    public function displayCar(){
    	//$cars = DB::select('SELECT * FROM blog.cars;');
    	if(request()->ajax()){ 
    		try{
        		return Datatables::queryBuilder(DB::table('blog.cars'))->make(true);
        	}catch(Exception $e)
	    	{
	    		return response()->json(['status'=>$e->getMessage()."\n"]); 
			} 
    	}
    } 
    public function insertCar(Request $request){   
	    if(request()->ajax()){
	    	try{
		    	$makecar = $request->input('make');
		    	$model = $request->input('model');
		    	$produced = $request->input('produced');
		    	DB::table('blog.cars')->insert([
				    [
				    	'make' => $makecar,
				    	'model' => $model,
				    	'produced_on' => $produced,
				    	'created_at' => date('Y-m-d H:i:s'),
				    	'updated_at' => date('Y-m-d H:i:s'),
					] 
				]);
		    	return response()->json(['status'=>'Successfully Added']);
			}catch(Exception $e)
	    	{
	    		return response()->json(['status'=>$e->getMessage()."\n"]); 
			} 
		}
    }

    public function updateCar(Request $request){
    	if(request()->ajax()){
    		try{ 
    			$id = $request->input('id');
    			$makecar = $request->input('make');
		    	$model = $request->input('model');
		    	$produced = $request->input('produced');
		    	DB::table('blog.cars')
			            ->where('id', $id)
			            ->update(
			            	[
			            		'make' => $makecar,
			            		'model' => $model,
			            		'produced_on' => $produced,
			            		'updated_at' => date('Y-m-d H:i:s')
			            	]);
			    return response()->json(['status'=>'Successfully Updated']); 
    		}catch(Exception $e)
	    	{
	    		return response()->json(['status'=>$e->getMessage()."\n"]); 
			} 
    	}

    }

    public function deleteCar(Request $request){ 
    	try{ 
    		$id = $request->input('id'); 
		    DB::table('blog.cars')->where('id', '=', $id)->delete();
			return response()->json(['status'=>'Successfully Deleted']); 
    	}catch(Exception $e)
	    {
	    	return response()->json(['status'=>$e->getMessage()."\n"]); 
		}  
    } 

    public function xmltohtml(){
    	try {
	    	$xmlData = array();   
		    $xmlTags = array();
		    $xmlTags['title'] = '<h1>';
		    $xmlTags['artist'] = '<i>';
		    $xmlTags['date'] = '<h3>';
		    $xmlTags['medium'] = '<h4>';
		    $xmlTags['movement'] = '<p>';
		    $xmlTag['more_info'] = '<p>';
			$xmlfile = file_get_contents("note.xml");
			$ob= simplexml_load_string($xmlfile);
			$json  = json_encode($ob);
			$configData = json_decode($json, true);

			foreach ($configData as $key => $value) {
				//foreach (array_keys($value) as $key2 => $value2) {
					$xmlData[] = array(
						'parent' => $key,
						'data'	=>  $value
					);
				//}
			}
			// foreach ($configData as $key => $value) {
			// 	$xmlArray[] = array(
			// 		'firstparent' => $value
			// 	);
			// 	//echo "<".$key.">";
			// 	 foreach ($value as $key2 => $value2) {
			// 	 	// foreach (array_keys($value2) as $key3 => $value3) {
			// 	 	// 	$xmlArray2[] = array(
			// 			// 	'secondparent' => $value3
			// 			// );
			// 	 	// 	//$xmlArray['firstparent'][] = $value3;
			// 	 	// 	//echo "<".$value3.">".$value2['author']."</".$value3.">";
			// 	 	// } 
			// 	  } 
			// 	//echo "</".$key.">";
			// }
			print_r("<pre>");print_r($xmlData);print_r("</pre>"); 
			foreach ($xmlData as $key => $value){ 
				$xmltagging = $value['parent'];
				echo $xmlTags[$value['parent']];
				//echo $value['parent'].'<br>'.$value['data'];
			} 
    		
    	} catch (Exception $e) {
    		
    	}
    } 
}
