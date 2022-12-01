<?php
namespace App\Action\Report;

use App\Domain\Report\Report;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SearchReport
{
  private $Report;
  public function __construct(Report $Report)
  {
    $this->Report = $Report;
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response, $args
  ): ResponseInterface 
  {
    $data = $request->getBody();
     $data =(array) json_decode($data);
     
    $Report = $this->Report->searchReport($data);
    $response->getBody()->write((string)json_encode($Report));
    return $response
          ->withHeader('Content-Type', 'application/json');
  }
}