<?php
namespace App\Domain\Report;
use PDO;
/**
* Repository.
*/
class ReportRepository
{
  /**
   * @var PDO The database connection
   */
  private $connection;
  /**
   * Constructor.
   *
   * @param PDO $connection The database connection
   */
  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  /**
   * Get Admin Roles rows.
   *
   * @return array 
   */
  
  public function searchReport($data): array
  {   

    try {
      extract($data);
      $where = ' where c.year_id = 11 and sa.promoted=0 ';
      if($from_date && $to_date){
        $where .= ' and (c.created_date BETWEEN "'.$from_date.'" AND "'.$to_date.'") ';
      }
      $select = 's.student_name,s.admission_number,cou.course_name,sec.section_name,sp.parent_firstname ,sp.parent_mobile_number,c.*';
      
      $sql ="SELECT $select FROM tbl_taxcertificate_info c 
        left join tbl_student s on s.student_id=c.student_id 
        left join tbl_student_parents sp on sp.student_id=c.student_id 
        and sp.relation_type=1
        left join tbl_student_academic sa on sa.student_id=c.student_id
        left join tbl_course cou on sa.course_id=cou.course_id
        left join tbl_section sec on sec.branch_id=s.branch_id  
        $where group by c.student_id order by c.certificate_id";

      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($res)){
       $status = array(
         'status' =>ERR_OK,
         'message' =>"Success",
         'Reports' => $res);
         return $status;
      }else{
        $status = array('status'=>ERR_NO_DATA,
         'message'=>"No Data Found",
         'Reports' =>array()
       );
         return $status;
      }
    } catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    }
  }
  


}