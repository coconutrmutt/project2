<?PHP
namespace App\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use App\Http\Controllers;
 
class Upload extends Model{

	public static function Adminpage(){
	 
		return DB::table('tbl_image')->orderBy('id','desc');
  
	}

	public static function Select_image(){
	   
 
		return DB::table('tbl_image')->orderBy('id','desc');
  
	    }

	public static function Select_Viewimagebar(){
	   
 
		return DB::table('tbl_image')->orderBy('id','desc');
  
	    }

	public static function Select_Viewimageicon(){
	   
 
		return DB::table('tbl_image')->orderBy('id','desc');
  
	    }

	public static function multiple_upload($data){
	   
		$insert = DB::table('tbl_image')->insert($data);

	    }

	public static function delete_image($id){

		$del = DB::table('tbl_image')->where('id', '=', $id)->delete();

		}

	public static function select_data($id){
	    
		return DB::table('tbl_image')->select('id','name', 'album', 'image', 'size', 'Type')->where('id','=',$id)->first();
 
	    }

	public static function update_image($data,$id){

		$insert = DB::table('tbl_image')->where('id', '=', $id)->update($data);
 
	    }

}
 
?>