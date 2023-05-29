<?php
  
namespace App\RepositoryInterface;

interface FeesRepositoryInterface{

    //index Table Fees
    public function index();

    //Create Form Insert Fees
    public function Create();

    public function store($request);


    public function edit($id);

    public function update($request);
    
    public function destroy($request);


}