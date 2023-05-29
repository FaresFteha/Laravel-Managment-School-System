<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            /* School Grade */
            ['en' => 'School Grade', 'ar' => 'المراحل الدراسية'],
            ['en' => 'List of grades', 'ar' => 'قائمة المراحل الدراسية'],
            /* OPERASION */
            ['en' => 'Add Grade', 'ar' => 'اضافة مرحلة'],
            ['en' => 'Edit Grade', 'ar' => 'تعديل مرحلة'],
            ['en' => 'Delete Grade', 'ar' => 'حذف مرحلة'],

            /*Classrooms*/
            ['en' => 'Classrooms', 'ar' => 'الصفوف الدراسية'],
            ['en' => 'List of Classrooms', 'ar' => 'قائمة الصفوف الدراسية'],
            /* OPERASION */
            ['en' => 'Add Classrooms', 'ar' => 'اضافة الصفوف'],
            ['en' => 'Edit Classrooms', 'ar' => 'تعديل الصفوف'],
            ['en' => 'Delete Classrooms', 'ar' => 'حذف الصفوف'],
            ['en' => 'Delete Chooese Classrooms', 'ar' => 'حذف الصفوف المختارة'],

            /*Sections*/
            ['en' => 'Sections', 'ar' => 'الاقسام'],
            ['en' => 'List of academic sections', 'ar' => 'قائمة الاقسام الدراسية'],
            /* OPERASION */
            ['en' => 'Add Sections', 'ar' => 'اضافة الاقسام'],
            ['en' => 'Edit Sections', 'ar' => 'تعديل الاقسام'],
            ['en' => 'Delete Sections', 'ar' => 'حذف الاقسام'],

            /*Parents*/
            ['en' => 'Parents', 'ar' => 'اولياء الامور'],
            ['en' => 'List of Parents', 'ar' => 'قائمة اولياء الامور'],
            /* OPERASION */
            ['en' => 'Add Parents', 'ar' => 'اضافة اولياء الامور'],
            ['en' => 'Edit Parents', 'ar' => 'تعديل اولياء الامور'],
            ['en' => 'Delete Parents', 'ar' => 'حذف اولياء الامور'],

            /*Teachers*/
            ['en' => 'Teachers', 'ar' => 'المعلمين'],
            ['en' => 'List of Teachers', 'ar' => 'قائمة المعلمين'],
            /* OPERASION */
            ['en' => 'Add Teachers', 'ar' => 'اضافة المعلمين'],
            ['en' => 'Edit Teachers', 'ar' => 'تعديل المعلمين'],
            ['en' => 'Delete Teachers', 'ar' => 'حذف المعلمين'],


            /*List Students*/
            ['en' => 'List Students', 'ar' => 'قائمة الطلاب'],
            /* Student Informaion */
            ['en' => 'Student Informaion', 'ar' => 'معلومات الطلاب'],
            ['en' => 'List Student', 'ar' => 'قائمة الطلاب'],
            /* OPERASION */
            ['en' => 'Add Student', 'ar' => 'اضافة الطلاب'],
            ['en' => 'Edit Student', 'ar' => 'تعديل الطلاب'],
            ['en' => 'show Student', 'ar' => 'عرض الطلاب'],
            /* OPERASION */
            ['en' => 'Add attachments for students', 'ar' => 'اضافة مرفقات للطلاب'],
            ['en' => 'Delete attachments for students', 'ar' => 'حذف مرفقات للطلاب'],
            ['en' => 'download attachments for students', 'ar' => 'تحميل مرفقات للطلاب'],

            ['en' => 'Add a fee invoice', 'ar' => 'أضف فاتورة رسوم'],
            ['en' => 'Receipt', 'ar' => 'سند قبض'],
            ['en' => 'Exclude fee', 'ar' => 'استبعاد الرسوم'],
            ['en' => 'Voucher of Exchange', 'ar' => 'سند الصرف'],
            ['en' => 'Print with Payments', 'ar' => 'اطبع المدفوعات'],
            ['en' => 'Account statement', 'ar' => 'كشف حساب'],
            ['en' => 'Delete Student', 'ar' => 'حذف الطلاب'],

            /* Student Promotions */
            ['en' => 'Student Promotions', 'ar' => 'ترقيات الطلاب'],
            /* Start OPERASION */
            ['en' => 'Add Student Promotions', 'ar' => 'اضافة ترقيات الطلاب'],
            /* End OPERASION */
            ['en' => 'Student Promotion Department', 'ar' => 'قسم الترقيات الطلابية'],
            /* OPERASION */
            ['en' => 'Edit Promotion', 'ar' => 'تعديل الترقيات'],
            ['en' => 'Delete Promotion', 'ar' => 'حذف الترقيات'],
            ['en' => 'Undo all', 'ar' => 'تراجع الكل'],

            /* Student Promotions */
            ['en' => 'Student Graduate', 'ar' => 'تخرج الطلاب'],
            /* Start OPERASION */
            ['en' => 'Add Graduate', 'ar' => 'اضافة تخرج الطلاب'],
            /* End OPERASION */
            ['en' => 'List Graduate', 'ar' => 'قائمة تخرج الطلاب'],
            /* OPERASION */
            ['en' => 'Edit Graduate', 'ar' => 'تعديل تخرج'],
            ['en' => 'Delete Graduate', 'ar' => 'حذف تخرج'],
            /* Student Acoounts */
            ['en' => 'Acoounts', 'ar' => 'الحسابات'],
            ['en' => 'Study Fees', 'ar' => 'رسوم دراسية'],
            /*  OPERASION */
            ['en' => 'Add Study Fees', 'ar' => 'اضافة رسوم دراسية'],
            ['en' => 'Edit Study Fees', 'ar' => 'تعديل رسوم دراسية'],
            ['en' => 'Delete Study Fees', 'ar' => 'حذف رسوم دراسية'],

            ['en' => 'Invoices', 'ar' => 'الفواتير'],
            /*  OPERASION */
            ['en' => 'Edit Invoices', 'ar' => 'تعديل الفواتير'],
            ['en' => 'Delete Invoices', 'ar' => 'حذف الفواتير'],

            ['en' => 'List of Receipt', 'ar' => 'قائمة سندات القبض'],
            /*  OPERASION */
            ['en' => 'Edit Receipt', 'ar' => 'تعديل سند قبض'],
            ['en' => 'Delete Receipt', 'ar' => 'حذف سند قبض'],
            ['en' => 'Print Receipt', 'ar' => 'طباعة سند قبض'],

            ['en' => 'List of Exclude Fee', 'ar' => 'قائمة استثناء الرسوم'],
            /*  OPERASION */
            ['en' => 'Edit Exclude Fee', 'ar' => 'تعديل استثناء الرسوم'],
            ['en' => 'Delete Exclude Fee', 'ar' => 'حذف استثناء الرسوم'],

            ['en' => 'List of Voucher of Exchange', 'ar' => 'قائمة سندات الصرف'],
            /*  OPERASION */
            ['en' => 'Edit Voucher of Exchange', 'ar' => 'تعديل سند الصرف'],
            ['en' => 'Delete Voucher of Exchange', 'ar' => 'حذف سند الصرف'],

            /* Student Acoounts */
            ['en' => 'Attendance', 'ar' => 'الحضور والغياب'],
            ['en' => 'List of Attendance', 'ar' => 'قائمة الحضور والغياب'],
            /* OPERASION */
            ['en' => 'Add Attendance', 'ar' => 'اضافة الحضور والغياب'],

            /* Student Acoounts */
            ['en' => 'Subjects', 'ar' => 'المواد'],
            ['en' => 'List Subjects', 'ar' => 'قائمة المواد'],
            /* OPERASION */
            ['en' => 'Add Subjects', 'ar' => 'اضافة المواد'],
            ['en' => 'Edit Subjects', 'ar' => 'تعديل المواد'],
            ['en' => 'Delete Subjects', 'ar' => 'حذف المواد'],


            /*Semester Exam Schedule*/
            ['en' => 'Semester Exam Schedule', 'ar' => 'جدول امتحانات الفصل الدراسي'],
            ['en' => 'List Semester Exam Schedule', 'ar' => 'قائمة جدول امتحانات الفصل الدراسي'],
            /* OPERASION */
            ['en' => 'Add Semester Exam Schedule', 'ar' => 'اضافة جدول امتحانات الفصل الدراسي'],
            ['en' => 'Edit Semester Exam Schedule', 'ar' => 'تعديل جدول امتحانات الفصل الدراسي'],
            ['en' => 'Delete Semester Exam Schedule', 'ar' => 'حذف جدول امتحانات الفصل الدراسي'],
            ['en' => 'Print Semester Exam Schedule', 'ar' => 'طباعة جدول امتحانات الفصل الدراسي'],

            /*Quizzes*/
            ['en' => 'Quizzes', 'ar' => 'الاختبارات'],
            ['en' => 'List of Quizzes', 'ar' => 'قائمة الاختبارات'],

            /* OPERASION */
            ['en' => 'Add Quizzes', 'ar' => 'اضافة الاختبارات'],
            ['en' => 'Edit Quizzes', 'ar' => 'تعديل الاختبارات'],
            ['en' => 'Delete Quizzes', 'ar' => 'حذف الاختبارات'],

            ['en' => 'Questions', 'ar' => 'الاسئلة'],
            /* OPERASION */
            ['en' => 'Add Questions', 'ar' => 'اضافة الاسئلة'],
            ['en' => 'Edit Questions', 'ar' => 'تعديل الاسئلة'],
            ['en' => 'Delete Questions', 'ar' => 'حذف الاسئلة'],

            /*Online classes*/
            ['en' => 'Online classes', 'ar' => 'حصص الاونلاين'],
            ['en' => 'Meeting rooms', 'ar' => 'غرف الإجتماعات'],
            /* OPERASION */
            ['en' => 'Add Meeting rooms Online', 'ar' => 'اضافة غرف الإجتماعات اونلاين'],
            ['en' => 'Add Meeting rooms Offline', 'ar' => 'اضافة غرف الإجتماعات اوفلاين'],
            ['en' => 'Delete Meeting rooms', 'ar' => 'حذف غرف الإجتماعات'],

            /*Students' marks and GPA*/
            ['en' => 'Students marks and GPA', 'ar' => 'علامات الطلاب وحساب المعدل'],
            ['en' => 'List of Students marks and GPA', 'ar' => 'قائمة علامات الطلاب وحساب المعدل'],
            /* OPERASION */
            ['en' => 'Add marks', 'ar' => 'اضافة العلامات'],
            ['en' => 'show marks', 'ar' =>  'عرض العلامات'],
            ['en' => 'Calculation marks', 'ar' => 'حساب المعدل'],
            ['en' => 'Delete marks', 'ar' => 'حذف العلامات'],

            

            /*Library */
            ['en' => 'Library', 'ar' => 'المكتبة'],
            ['en' => 'List of Library', 'ar' => 'قائمة المكتبة'],
            /* OPERASION */
            ['en' => 'Add book', 'ar' => 'اضافة كتب'],
            ['en' => 'Edit book', 'ar' => 'تعديل كتب'],
            ['en' => 'Delete book', 'ar' => 'حذف كتب'],
            ['en' => 'Download a book', 'ar' => 'تحميل كتاب'],

            /*Users */
            ['en' => 'Users', 'ar' => 'المستخدمين'],
            ['en' => 'List of Users', 'ar' => 'قائمة المستخدمين'],
            /* OPERASION */
            ['en' => 'Add Users', 'ar' => 'اضافة المستخدمين'],
            ['en' => 'Edit Users', 'ar' => 'تعديل المستخدمين'],
            ['en' => 'Delete Users', 'ar' => 'حذف المستخدمين'],
            ['en' => 'Show Users', 'ar' => 'عرض المستخدمين'],

            ['en' => 'User Permissions', 'ar' => 'الصلاحيات'],
            /* OPERASION */
            ['en' => 'Add Permissions', 'ar' => 'اضافة صلاحيات'],
            ['en' => 'Edit Permissions', 'ar' => 'تعديل صلاحيات'],
            ['en' => 'Delete Permissions', 'ar' => 'حذف صلاحيات'],
            ['en' => 'Show Permissions', 'ar' => 'عرض صلاحيات'],

            /*Academic Year */
            ['en' => 'Academic Year', 'ar' => 'السنة الاكاديمية'],
             /* OPERASION */
            ['en' => 'Add Academic Year', 'ar' => 'اضافة سنة اكاديمية'],
            ['en' => 'Edit Academic Year', 'ar' => 'تعديل سنة اكاديمية'],
            ['en' => 'Delete Academic Year', 'ar' => 'حذف سنة اكاديمية'],

            
            /*Settings */
            ['en' => 'Settings', 'ar' => 'الاعدادات'],
            ['en' => 'Edit Settings', 'ar' => 'تعديل الاعدادات'],
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
