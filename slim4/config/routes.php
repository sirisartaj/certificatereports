<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
  
  
  
  $app->post('/searchreport', \App\Action\Report\SearchReport::class);

   
};