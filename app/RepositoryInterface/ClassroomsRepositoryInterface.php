<?php
namespace App\RepositoryInterface;

interface ClassroomsRepositoryInterface{

public function index($request);

public function store($request);

public function update($request);

public function destroy($request);

public function delete_all($request);

public function Filter_Classes($request);




}