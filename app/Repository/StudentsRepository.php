<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\myparent;
use App\Models\Classroom;
use App\Models\Type_Blood;
use App\Models\Fee_invoice;
use App\Models\Nationalitie;
use Livewire\WithPagination;
use App\Models\ReceiptStudent;
use App\Models\StudentAcounnt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Storage;
use App\RepositoryInterface\StudentsRepositoryInterface;

class StudentsRepository implements StudentsRepositoryInterface
{
    use WithPagination;
    use AttachFilesTrait;
    public function view_Page()
    {

        // The following code is used to retrieve data from the database and pass it to a Blade view for display

        // Retrieve all the records from the Grade model and store them in $data array under 'my_classes' key
        $data['my_classes'] = Grade::all();

        // Retrieve all the records from the myparent model and store them in $data array under 'myparent' key
        $data['myparent'] = myparent::all();

        // Retrieve all the records from the Gender model and store them in $data array under 'Genders' key
        $data['Genders'] = Gender::all();

        // Retrieve all the records from the Nationalitie model and store them in $data array under 'nationals' key
        $data['nationals'] = Nationalitie::all();

        // Retrieve all the records from the Type_Blood model and store them in $data array under 'bloods' key
        $data['bloods'] = Type_Blood::all();

        // Render the 'Add_Students' page, passing in the $data array as an argument
        return view('pages.Students.Add_Students',  $data);
    }

    public function view_Students($id)
    {

        // The following code fetches data regarding all students in a specific section from the database
        // based on the value of $id passed as an argument to the where method

        $students = Student::where('section_id', $id)
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 5);

        /* The orderBy method sorts the resultset in ascending or descending order 
        based on the value provided for the 'sort_by' parameter
        If the 'sort_by' parameter is not specified, it defaults to sorting by id in descending order.
        
        The paginate method is used to split the query results into multiple pages with a specified number of records per page.
        The 'limit_by' parameter specifies the maximum number of records per page, and if not provided, defaults to 5. */

        // The resulting dataset is passed to the 'Students' view as a variable named 'students'
        return view('pages.Students.Students', compact('students'));
    }

    // The following code defines a function named 'view_Sections' which fetches data about Grades and their associated sections from the database

    public function view_Sections()
    {
        // The with method eager loads the 'Sections' relationship for all Grade objects returned by the query
        $Grades = Grade::with(['Sections'])->get();

        // $list_Grades variable is assigned all Grade records in the database
        $list_Grades = Grade::all();

        /* 'Sections' view is returned, with 'Grades' and 'list_Grades' passed as variables to be used in the view
       'Grades' contains all of the Grades in the database, each with their related Section records.
       'list_Grades' contains all of the Grades in the database. */

        return view('pages.Students.Sections', compact('Grades', 'list_Grades'));
    }



    // This function takes a request object as an argument and returns a string of HTML code for a dropdown list of classes associated with a particular grade.

    public function get_Classes($request)
    {
        // Get all the classes that belong to the grade ID passed in the request.
        $List_Classes = Classroom::where("Grade_id", $request->id)->get();

        // Initialize an empty string to store the HTML code for the dropdown list.
        $output = '<option value ="">' . ucfirst("--حدد الصف --") . '</option>';

        // Loop through each class and add it to the dropdown list HTML code.
        foreach ($List_Classes as $List_Classesitem) {
            $output .= '<option value =" ' . $List_Classesitem->id . '">' . $List_Classesitem->name_class . '</option>';
        }

        // Output the HTML code for the dropdown list.
        echo $output;

        /*
       // The following code was commented out and is not executed, but appears to be another way to generate a list of classes and return it as an array with keys being the ID and values being the class name.
       $List_Classes = Classroom::where("Grade_id" , $id)->pluck("name_class" , "id");
       return $List_Classes;
       */
    }


    // This function takes a request object as an argument and returns a string of HTML code for a dropdown list of sections associated with a particular classroom.

    public function get_Section($request)
    {
        // Get all the sections that belong to the classroom ID passed in the request.
        $List_Classes = Section::where("classroom_id", $request->id)->get();

        // Initialize an empty string to store the HTML code for the dropdown list.
        $output = '<option value ="">' . ucfirst("--حدد القسم --") . '</option>';

        // Loop through each section and add it to the dropdown list HTML code.
        foreach ($List_Classes as $List_Classesitem) {
            $output .= '<option value =" ' . $List_Classesitem->id . '">' . $List_Classesitem->name_sections . '</option>';
        }

        // Output the HTML code for the dropdown list.
        echo $output;

        /*
      // The following code was commented out and is not executed, but appears to be another way to generate a list of classes and return it as an array with keys being the ID and values being the class name.
      $List_Classes = Classroom::where("Grade_id" , $id)->pluck("name_class" , "id");
      return $List_Classes;
      */
    }






    // This function takes a request object as an argument and creates a new student record in the database based on the values provided in the request.

    public function Store_Student($request)
    {
        // Begin a database transaction so that changes can be rolled back if an error occurs.
        DB::beginTransaction();

        try {
            // Create a new Student object to hold the data from the request.
            $students = new Student();

            // Set the name of the student in English and Arabic languages using an associative array.
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];

            // Set other properties of the student object based on the corresponding fields in the request.
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;

            // Set the file name property of the student object to the original name of the uploaded file.
            $students->file_name =  $request->file('file_name')->getClientOriginalName();

            // Save the student object in the database.
            $students->save();

            // Upload the file associated with this student to the "student_images" directory using the uploadFile method.
            $this->uploadFile($request, 'file_name', 'student_images');

            // Commit the transaction since everything was successful.
            DB::commit();

            // Show a success message using toastr and redirect back to the students table view page.
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('StudentsTableview');
        } catch (\Exception $e) {
            // If an error occurred, rollback the transaction and redirect back with an error message containing the error that occurred.
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // This function loads the edit view for a single student by ID. It takes an $id parameter that specifies which student to load.

    public function Students_Edit($id)
    {
        // Load all Grades, Parents, Genders, Nationalities and Blood Types from their respective tables and store them in the $data array.
        $data['Grades'] = Grade::all();
        $data['parents'] = myparent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();

        // Find the Student model with the specified ID and store it in the $Students variable.
        $Students = Student::findOrFail($id);

        // Load the edit view for the student using the data array and the $Students model object.
        return view('pages.Students.edit',  $data, compact('Students'));
    }


    // This function updates the information of a student and takes a $request object as parameter that contains the updated data.
    public function Students_Update($request)
    {
        try {
            // If the password field in the request is not empty, find the student model with the specified ID and update its fields including the hashed password. 
            if (!empty($request->password)) {
                $students = Student::findorfail($request->id);
                $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                $students->email = $request->email;
                $students->password = Hash::make($request->password);
                $students->gender_id = $request->gender_id;
                $students->nationalitie_id = $request->nationalitie_id;
                $students->blood_id = $request->blood_id;
                $students->Date_Birth = $request->Date_Birth;
                $students->Grade_id = $request->Grade_id;
                $students->Classroom_id = $request->Classroom_id;
                $students->section_id = $request->section_id;
                $students->parent_id = $request->parent_id;
                $students->academic_year = $request->academic_year;
                $students->save();

                // If the password field in the request is empty, find the student model with the specified ID and update its fields except the password field. 
            } else {
                $students = Student::findorfail($request->id);
                $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                $students->email = $request->email;
                $students->gender_id = $request->gender_id;
                $students->nationalitie_id = $request->nationalitie_id;
                $students->blood_id = $request->blood_id;
                $students->Date_Birth = $request->Date_Birth;
                $students->Grade_id = $request->Grade_id;
                $students->Classroom_id = $request->Classroom_id;
                $students->section_id = $request->section_id;
                $students->parent_id = $request->parent_id;
                $students->academic_year = $request->academic_year;
                $students->save();
            }

            // Display a success message using Toastr and redirect to the StudentsTableview route.
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('StudentsTableview');
        } catch (\Exception $e) {
            // If there is an exception, redirct back to the previous page and display the error message.
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // This function deletes the student with the specified ID and takes a $request object as parameter that contains the ID of the student to be deleted.
    public function Students_Destory($request)
    {
        // Delete the student model with the specified ID using Eloquent's destroy() method.
        Student::destroy($request->id);

        // Display a success message using Toastr and redirect to the StudentsTableview route.
        toastr()->success(trans('meesageop.Delete'));
        return redirect()->route('StudentsTableview');
    }



    // This function retrieves the details of a student with the specified ID and returns them to a view for display.
    public function Students_Show($id)
    {
        // Find a student model with the specified ID or throw an error if not found using Eloquent's findOrFail() method.
        $Student = Student::findOrFail($id);

        // Return a view named 'show' in the pages/Students directory and pass the retrieved student as a variable named 'Student'.
        return view('pages.Students.show', compact('Student'));
    }


    // This function uploads one or more file attachments and associates them with a student record, then redirects to the student's show page with a success message.
    public function Upbloade_Attachment($request)
    {

        // Iterate over each uploaded file in the 'photos' field of the incoming request.
        foreach ($request->file('photos') as $file) {
            // Get the original filename of the uploaded file.
            $name = $file->getClientOriginalName();

            // Store the uploaded file in the 'attachments/students/[student_name]' directory (using the upload_attachments disk).
            // Use the original filename as the new filename for the stored file.
            $file->storeAs('attachments/students/' . $request->student_name,  $file->getClientOriginalName(), 'upload_attachments');

            // Create a new image record in the database with the filename, associated student ID, and imageable type of 'App\Models\Student'.
            $images = new Image();
            $images->filename = $name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }

        // Show a success message using the Toastr library.
        toastr()->success(trans('meesageop.success'));

        // Redirect to the show page for the associated student record.
        return redirect()->route('Students.show', $request->student_id);
    }


    // This function downloads a specific file attachment associated with a student record by specifying the name of the student and the filename.
    public function Download_attachement($studentsname, $filename)
    {

        // Get the full file path of the requested attachment using the 'public_path' helper function (e.g. '/var/www/html/myproject/public/attachments/students/[studentsname]/[filename]').
        $file_path = public_path('attachments/students/' . $studentsname . '/' . $filename);

        // Return the file as a response download object to be prompted for download by the user's browser.
        return response()->download($file_path);
    }


    // This function deletes a specific attachment file associated with a student record by specifying the name of the student and the filename.
    public function Delete_attachment($request)
    {
        // Use Laravel's Storage facade to delete the requested attachment file from the 'upload_attachments' disk (e.g. C drive) using its full path ('attachments\students\[studentsname]\[filename]').
        Storage::disk('upload_attachments')->delete('attachments\students' . $request->student_name . '/' . $request->filename);

        // Use Eloquent's Image model to delete the image record in the database that matches the given id and filename of the deleted attachment.
        Image::where('id', $request->id)->where('filename', $request->filename)->delete();

        // Use toastr library to show an error message to indicate that the attachment has been successfully deleted.
        toastr()->error(trans('meesageop.Delete'));

        // Redirect the user's browser to the student detail page related to this attachment, identified by its student_id parameter.
        return redirect()->route('Students.show', $request->student_id);
    }

    // This function generates an invoice that contains a summary of all receipts for fees paid by a specific student record, identified by its id parameter.
    public function print_Fatora($id)
    {
        // Retrieve the fee invoice for a specific student record by using Laravel's Eloquent ORM to execute a query that matches the student_id field in the Fee_invoice model with the given id parameter. 
        $Fee_invoice = Fee_invoice::where('student_id', $id)->first();

        // Retrieve all receipt records associated with the same student record by executing another query against the ReceiptStudent model that matches the student_id field with the given id parameter. Collect all the resulting records into a collection object.
        $receipt_students = ReceiptStudent::where('student_id', $id)->get();

        // If there are no receipt records found for this student, show an error message using the toastr library and redirect the user's browser to the StudentTableview page.
        if ($receipt_students->isEmpty()) {
            toastr()->error(trans('Invoice_Accoints_trans.Fees_toaster'));
            return redirect()->route('StudentsTableview');
        }
        // Otherwise, render the 'invoices' layout view, passing it the retrieved Fee_invoice model and the collection of receipt records as compact variables for use in the view.
        else {
            return view('layouts.invoices', compact('Fee_invoice', 'receipt_students'));
        }
    }


    // This function generates a statement of account for a specific student identified by its id parameter. 
    public function accounts_Statment($id)
    {
        // Retrieve the fee invoice for a specific student record by using Laravel's Eloquent ORM to execute a query that matches the student_id field in the Fee_invoice model with the given id parameter. 
        $Fee_invoice = Fee_invoice::where('student_id', $id)->first();

        // Retrieve all receipt records associated with the same student record by executing another query against the ReceiptStudent model that matches the student_id field with the given id parameter. Collect all the resulting records into a collection object and paginate the results with a limit of 5 records per page.
        $receipt_students = ReceiptStudent::where('student_id', $id)->paginate(5);

        // Retrieve all student account records associated with the same student record by executing a query against the StudentAcounnt model that matches the student_id field with the given id parameter. Collect all the resulting records into a collection object.
        $student_acounnts = StudentAcounnt::where('student_id', $id)->get();

        // If there are no student account records found for this student, show an error message using the toastr library and redirect the user's browser to the StudentTableview page.
        if ($student_acounnts->isEmpty()) {
            toastr()->error(trans('Invoice_Accoints_trans.Fees_toaster'));
            return redirect()->route('StudentsTableview');
        }
        // Otherwise, render the 'Account_statment' view, passing it the retrieved Fee_invoice model, the collection of receipt records paginated with a limit of 5 records per page, and the collection of student account records as compact variables for use in the view.
        else {
            return view('pages.Students.Account_statment', compact('receipt_students', 'Fee_invoice', 'student_acounnts'));
        }
    }
}
