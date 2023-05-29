<?php
  
namespace App\RepositoryInterface;

interface GraudatedRepositoryInterface{
    
    public function create();

    public function Graduate();

    public function softDeletes($request);

    public function ReturnData($request);

    public function Destroy($request);


    
}