<?php
namespace App\Domain\Report;

use App\Domain\Report\ReportRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/**
 * Service.
 */
final class Report
{
  /**
   * @var LoanRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param LoanRepository $repository The repository
   */
  public function __construct(ReportRepository $repository)
  {
    $this->repository = $repository;
  }
  
  public function searchReport($data) {
    //print_r($data);exit;
    $User = $this->repository->searchReport($data);
    return $User;
  }
}