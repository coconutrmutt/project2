<?php
namespace App\Http\Controllers;
use App\Model\Upload;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Input;
use Redirect;
use Validator;
use File;
use Session;
use Storage;
use DB;

class UploadImageController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAdminpage(){
	
		 	$results = Upload::Adminpage()->paginate(4);
        	return view('upload.admin',['results' => $results]);
	}

	public function getShowImage(){

			$results = Upload::Select_image()->paginate(4);
			return view('upload.show',['results' => $results]);
	}

	public function getviewImagebar(){

			$pictures = Upload::Select_Viewimagebar()->paginate(4);
			return view('upload.viewimagebar',['pictures' => $pictures]);
	}

	public function getviewImageicon(){

			$pictures = Upload::Select_Viewimageicon()->paginate(4);
			return view('upload.viewimageicon',['pictures' => $pictures]);
	}

	public function getmultiple_upload(Request $data){

			 $name = Input::get('name'); 
			 $files = Input::file('images');
		     $file_count = count($files);
		     $uploadcount = 0;

		    foreach($files as $file) {
			      $rules = array('file' => 'required|mimes:jpeg,png,jpg,gif|max:5000000');
			      $validator = Validator::make(array('file'=> $file), $rules);

			      if ($validator->fails()) {

    					Session::flash('error', 'Upload Fail');
					    return Redirect::to('formadd');
					  }

			      if($validator->passes()){
			        $destinationPath = 'uploads\logo';
			        $size = $file->getSize();
			        $type = $file->getMimeType();
			        $extension = $file->getClientOriginalExtension();
			        $filename = rand(11111,99999).'.'.$extension;
			        $upload_success = $file->move($destinationPath, $filename, $size);
			        $uploadcount ++;

			        if ($size > 1048576){ 

			        	$size = number_format(($size/1024)/1024,2)."MB";

			    			}else{

			    		$size = number_format($size/1024,2)."KB";

			    			}

					      }

						$data = array(
			        	'name' => $name,
			        	'image' => $upload_success,
			        	'size' => $size,
			        	'Type' => $type

			        	);

			            Upload::multiple_upload($data);

					}

						Session::flash('success', 'Upload successfully');
						return Redirect::to('formadd');

	}

	public function getDeleteImage($id){

			 $filename = DB::table('tbl_image')->where('id', $id)->get();
			    $filname =  "C:\\xampp\\htdocs\\project2\\public"."\\".$filename[0]->image;
			    $success = File::delete($filname);
			    echo "<br>";
			    if($success){
			    echo 'Yes';
				}else{
				echo 'No--->'.$success;
				}
				if(File::exists($filname)){
					File::delete($filname); 
				}else{
					echo "Delete Success!";
					echo File::exists($filname);
				}

				Upload::delete_image($id);

			return Redirect::to('admin');
	}

	public function getFormUpdate($id){

			$results = Upload::select_data($id);
 
				$data = array(
		 
						 'results'  => $results,
		 
						);

			return view('upload.update',$data);
	}

	public function getUpdateImage(Request $data){

  			
			$id = $data->Input('id');
			$logo = $data->file('image');


			$rules = array('file' => 'required|mimes:jpeg,png,jpg,gif|max:5000000');
			 $validator = Validator::make(array('file'=> $logo), $rules);

			   if ($validator->fails()) {

    				Session::flash('error', '');
					 return Redirect::to('formupdate/'.$id);
				}

			$upload = 'uploads\logo';
			$extension = $logo->getClientOriginalExtension();
			$size = $logo->getSize();
			$type = $logo->getMimeType();
			$filename = rand(11111,99999).'.'.$extension;
			$success = $logo->move($upload, $filename, $size);

			if ($size > 1048576){ 

			$size = number_format(($size/1024)/1024,2)."MB";

			}else{

			$size = number_format($size/1024,2)."KB";

			    }

			if($success){

			$id = $data->Input('id'); 
			$name = $data->Input('name');
			$image = $filename;
			}

			$data = array(

				'name' => $name,
				'image' => $success,
				'size' => $size,
				'type' => $type
				);
 
			Upload::update_image($data,$id);

			Session::flash('success', 'Update successfully');
			return Redirect::to('formupdate/'.$id);
	}

}