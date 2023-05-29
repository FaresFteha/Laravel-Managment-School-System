<?php
namespace App\RepositoryInterface;

interface StudentsRepositoryInterface{

    public function view_Page();

    public function view_Students($id);

    public function view_Sections();


    public function get_Classes($request);


    public function get_Section($request);


    public function Store_Student($request);


    public function Students_Edit($id);


    public function Students_Update($request);


    public function Students_Destory($request);


    public function Students_Show($id);

    public function Upbloade_Attachment($request);


    public function Download_attachement($studentsname,$filename);

    public function Delete_attachment($request);

    public function print_Fatora($id);

    public function accounts_Statment($id);
    

    
  
}