<?php

namespace App\RepositoryInterface;

interface UsersRepositoryInterface{
        
public function index($request);

public function create();

public function show($id);

public function store($request);

public function edit($id);

public function update($request , $id);

public function destroy($request);
}