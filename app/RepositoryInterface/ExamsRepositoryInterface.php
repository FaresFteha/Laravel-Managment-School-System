<?php 
namespace App\RepositoryInterface;

interface ExamsRepositoryInterface{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    public function print_Exams($id);
}