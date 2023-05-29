<?php

namespace App\RepositoryInterface;

interface StudentsAvaregeRepositoryInterface{
        
public function index();

public function create();

public function store($request);


public function show($id);

public function edit($id);


public function mark_show($id);

public function update($request , $id);

public function destroy($request);


public function avaregeMarksCreate($request);
}