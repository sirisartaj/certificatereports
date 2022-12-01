<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\CertificateModel;
  
class CertificateController extends Controller
{
    public function index()
    {
        $CertificateModel = new CertificateModel;
        if($this->request->getVar()){
            $data['from_date']= $this->request->getVar('from_date');
            $data['to_date']= $this->request->getVar('to_date');
            if($data['from_date']==''){
                $data['from_date'] = date('Y-m-d H:i:s', strtotime('-1 month'));
            } 
            if($data['to_date']==''){
                $data['to_date'] = date('Y-m-d H:i:s');
            }    
        }else{            
            $data['from_date']= date('Y-m-d H:i:s', strtotime('-1 month'));
            $data['to_date']= date('Y-m-d H:i:s');            
            
        }
        $data['report'] = (array) $CertificateModel->searchreport($data)->Reports;
        $data['headding'] ='Reports';
        echo view('certificate_reports_view',$data);
    }

    
}