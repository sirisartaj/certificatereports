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
                $data['from_date'] = date('Y-m-d H=>i=>s', strtotime('-1 month'));
            } 
            if($data['to_date']==''){
                $data['to_date'] = date('Y-m-d H=>i=>s');
            }    
        }else{            
           // $data['from_date']= date('Y-m-d H=>i=>s', strtotime('-1 month'));
           // $data['to_date']= date('Y-m-d H=>i=>s');            
            
        }
        //$data['report'] = (array) $CertificateModel->searchreport($data)->Reports;
        $data['headding'] ='Reports';
        $data['view'] = 'report_with_search';
        echo view('certificate_reports_view',$data);
    }

    function ajaxhtml(){
        $data['view'] = 'ajaxhtml';
        echo view('certificate_reports_view',$data);
        
    }

    function seachresults(){
        $CertificateModel = new CertificateModel;
        $data['from_date']= $this->request->getVar('from_date');
        $data['to_date']= $this->request->getVar('to_date');
        if($data['from_date']==''){
            $data['from_date'] = date('Y-m-d H=>i=>s', strtotime('-1 month'));
        } 
        if($data['to_date']==''){
            $data['to_date'] = date('Y-m-d H=>i=>s');
        } 
        $res = $CertificateModel->searchreport($data);
        echo json_encode($res);
        //print_r($res['data']);exit;
       return ($res);
        // $res = ["data"=> [
        // ["Tiger Nixon","System Architect","Edinburgh","5421","2011/04/25","$320,800"],
        // ["Garrett Winters","Accountant","Tokyo","8422","2011/07/25","$170,750"]]];
    
        // echo json_encode($res);
    }

    
}