<?php

namespace App\RepositoryInterface;

interface ZoomRepositoryInterface{
        
public function index();

public function create();

public function store($request);

public function indirectCreate();

public function indirectStore($request);

public function destroy($request);
}