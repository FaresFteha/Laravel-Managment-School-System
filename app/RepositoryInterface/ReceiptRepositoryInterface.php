<?php

namespace App\RepositoryInterface;

interface ReceiptRepositoryInterface{
    
public function index();

public function show($id);

public function store($request);

public function edit($id);

public function update($request);

public function destroy($request);

public function print_Fatora_Receipt($id);



}