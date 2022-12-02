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
            
      $sql ="select c.certificate_id,c.created_date,s.student_id, s.admission_number, s.student_name
              ,(select sp.parent_firstname from tbl_student_parents sp where sp.student_id = s.student_id 
              order by sp.relation_type asc limit 1) as parent_firstname,(select sp.parent_mobile_number from tbl_student_parents sp where sp.student_id = s.student_id 
              order by sp.relation_type asc limit 1) as parent_mobile_number,
               tc.course_name, tsec.section_name,u.user_name
              from 
              tbl_taxcertificate_info c 
              right join tbl_student_academic sa on c.student_id = sa.student_id and c.year_id = sa.year_id and c.year_id = 11 and sa.promoted = 0
              left join tbl_student s on s.student_id = c.student_id
              left join tbl_course tc on tc.course_id = sa.course_id
              left join tbl_section tsec on tsec.section_id = sa.section_id
              left join tbl_users u on u.user_id = c.created_by
              where 
              sa.promoted = 0 and c.year_id = 11 and (c.created_date BETWEEN '".$from_date."' AND '".$to_date."')";
      
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      //echo count($res);exit;
      if(!empty($res)){
       $status = array(
        
        "recordsFiltered"=>count($res),
        "recordsTotal"=>count($res),
         "data" => $res);
         return $status;
      }else{
        $status = array('status'=>ERR_NO_DATA,
         'message'=>"No Data Found",
         'data' =>array()
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