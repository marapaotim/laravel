<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	$cars = DB::select('SELECT * FROM blog.cars;'); 
        return response()->json($cars);
    } 
    public function insertCar(Request $request){ 
	    if(request()->ajax()){
	    	try{
		    	$makecar = $request->input('make');
		    	$model = $request->input('model');
		    	DB::table('blog.cars')->insert([
				    [
				    	'make' => $makecar,
				    	'model' => $model,
				    	'produced_on' => date('Y-m-d H:i:s'),
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
		    	DB::table('blog.cars')
			            ->where('id', $id)
			            ->update(
			            	[
			            		'make' => $makecar,
			            		'model' => $model
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
    	if(file_exists('file.xml'))
		{
			$xml = simplexml_load_file('file.xml');
			$result = $xml->xpath('/Response/Rates/Service');

			$options = [];
			while(list( , $node) = each($result)) {
				$name = (String)$node->Name[0];
				$total = (String)$node->Total[0];
				$options[] = "<option value='" . $name . ", " .  $total . "'>+ " . $name . " - " . $total . "</option>"; 
			}
			$options = implode("", $options);

			echo "<select name='shipping_name'>" . $options . "</select>";

		}
		else
		{
			exit('Failed to open file.');
		}
    } 
}
