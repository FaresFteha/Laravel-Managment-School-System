<?php
namespace App\RepositoryInterface;
interface SectionsRepositoryInterface{
    
public function index();

public function store($request);

public function update($request);

public function getclasses($request);

public function destroy($request);



}