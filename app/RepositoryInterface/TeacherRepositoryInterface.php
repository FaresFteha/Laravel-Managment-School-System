<?php
namespace App\RepositoryInterface;

interface TeacherRepositoryInterface{

    
    // get all Teachers
    public function getAllTeachers();

    // get all  getSpecializations
    public function getSpecializations();

    // get all  getGenders
    public function getGenders();

   // get all  StoreTeachers
   public function StoreTeachers($request);

    // get all  EditTeachers
    public function EditTeachers($id);

    
    // get all  EditTeachers
    public function UpdateTeachers($request);

        
    // get all  EditTeachers
    public function destoryTeachers($request);
}