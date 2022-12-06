<?php 
namespace App\Models;  
use CodeIgniter\Model;
use App\Controllers\Home;
  
class AttendenceModel extends Model{
    //protected $table = 'tbl_taxcertificate_info';
    //protected $primaryKey = 'certificate_id';
    

    public function searchreport($data){
        $home = new home();             
        $url = baseURL1.'/lateattendencereport';
        //print_r(json_encode($data));exit;
        return $home->CallAPI('POST',$url,$data);       
    }
    
}