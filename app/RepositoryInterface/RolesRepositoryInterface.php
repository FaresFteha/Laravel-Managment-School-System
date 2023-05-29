<?php

namespace App\RepositoryInterface;

interface RolesRepositoryInterface{
        
public function index($request);

public function create();

public function store($request);

public function edit($id);

public function show($id);

public function update($request ,$id);

public function destroy($request);
}