<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed light-side-menu">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('home') }}" data-target="#dashboard">
                            <!-- ترجمة النص حسب اللغة الحاالية-->
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('main_siadebar_trans.Home') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>


                    <!-- menu title  -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('main_siadebar_trans.commponent') }}</li>
                    <!-- menu item Grades-->
                    @can('المراحل الدراسية')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades">
                                <div class="pull-left"><i class="fa fa-university"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Grades') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة المراحل الدراسية')
                                <ul id="Grades" class="collapse" data-parent="#sidebarnav">
                                    <li><a
                                            href="{{ route('GradesTableview') }}">{{ trans('main_siadebar_trans.Grades_table') }}</a>
                                    </li>
                                </ul>
                            @endcan

                        </li>
                        <!-- menu item Grades-->
                    @elsecan('School Grade')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades">
                                <div class="pull-left"><i class="fa fa-university"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Grades') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of grades')
                                <ul id="Grades" class="collapse" data-parent="#sidebarnav">
                                    <li><a
                                            href="{{ route('GradesTableview') }}">{{ trans('main_siadebar_trans.Grades_table') }}</a>
                                    </li>
                                </ul>
                            @endcan
                        </li>
                    @endcan



                    @can('الصفوف الدراسية')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#class_rooms">
                                <div class="pull-left"><i class="fa fa-building"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.class_rooms') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة الصفوف الدراسية')
                                <ul id="class_rooms" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ route('ClassTableview') }}">{{ trans('main_siadebar_trans.class_table') }}</a>
                                    </li>
                                </ul>
                            @endcan
                        </li>
                    @elsecan('Classrooms')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#class_rooms">
                                <div class="pull-left"><i class="fa fa-building"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.class_rooms') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of Classrooms')
                                <ul id="class_rooms" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ route('ClassTableview') }}">{{ trans('main_siadebar_trans.class_table') }}</a>
                                    </li>
                                </ul>
                            @endcan
                        </li>
                    @endcan


                    @can('الاقسام')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                                <div class="pull-left"><i class="fa fa-sort-alpha-asc"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.sections') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة الاقسام الدراسية')
                                <ul id="sections" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ route('SectionsTableview') }}">{{ trans('main_siadebar_trans.sections_table') }}</a>
                                    </li>
                                </ul>
                            @endcan

                        </li>
                    @elsecan('Sections')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                                <div class="pull-left"><i class="fa fa-sort-alpha-asc"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.sections') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of academic sections')
                                <ul id="sections" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ route('SectionsTableview') }}">{{ trans('main_siadebar_trans.sections_table') }}</a>
                                    </li>
                                </ul>
                            @endcan

                        </li>
                    @endcan


                    <!-- menu font icon-->
                    @can('اولياء الامور')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents">
                                <div class="pull-left"><i class="fa  fa-user"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Parents') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة اولياء الامور')
                                <ul id="Parents" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ url('Insert.Parents') }}">{{ trans('main_siadebar_trans.List_Parents') }}</a>
                                    </li>
                                </ul>
                            @endcan

                        </li>
                    @elsecan('Parents')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents">
                                <div class="pull-left"><i class="fa  fa-user"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Parents') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of Parents')
                                <ul id="Parents" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ url('Insert.Parents') }}">{{ trans('main_siadebar_trans.List_Parents') }}</a>
                                    </li>
                                </ul>
                            @endcan

                        </li>
                    @endcan



                    <!--Teachers-->
                    @can('المعلمين')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers">
                                <div class="pull-left"><i class="fa  fa-briefcase"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Teachers') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة المعلمين', 'List of Teachers')
                                <ul id="Teachers" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ route('TeachersTableview') }}">{{ trans('main_siadebar_trans.Teachers') }}</a>
                                    </li>
                                </ul>
                            @endcan
                        </li>
                    @elsecan('Teachers')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers">
                                <div class="pull-left"><i class="fa  fa-briefcase"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Teachers') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of Teachers')
                                <ul id="Teachers" class="collapse" data-parent="#sidebarnav">
                                    <li> <a
                                            href="{{ route('TeachersTableview') }}">{{ trans('main_siadebar_trans.Teachers') }}</a>
                                    </li>
                                </ul>
                            @endcan
                        </li>
                    @endcan



                    <!-- students-->
                    @can('قائمة الطلاب')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                    class=" fa fa-mortar-board"></i>{{ trans('main_siadebar_trans.students') }}<div
                                    class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>

                            <ul id="students-menu" class="collapse">
                                @can('معلومات الطلاب')
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#Student_information">{{ trans('main_siadebar_trans.Student_information') }}
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="Student_information" class="collapse">
                                            @can('قائمة الطلاب')
                                                <li> <a
                                                        href="{{ route('StudentsTableview') }}">{{ trans('main_siadebar_trans.students') }}</a>
                                                </li>
                                            @endcan

                                            @can('اضافة الطلاب')
                                                <li> <a
                                                        href="{{ route('create') }}">{{ trans('main_siadebar_trans.Add_student') }}</a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </li>
                                @endcan

                                @can('ترقيات الطلاب')
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#Students_upgrade">{{ trans('main_siadebar_trans.Students_Promotions') }}
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="Students_upgrade" class="collapse">
                                            @can('اضافة ترقيات الطلاب')
                                                <li> <a
                                                        href="{{ route('Promotions.index') }}">{{ trans('main_siadebar_trans.promotions') }}</a>
                                                </li>
                                            @endcan

                                            @can('قسم الترقيات الطلابية')
                                                <li> <a
                                                        href="{{ route('Promotions.create') }}">{{ trans('main_siadebar_trans.PromotionsStudents') }}</a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </li>
                                @endcan

                                @can('تخرج الطلاب')
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#Graduate students">{{ trans('main_siadebar_trans.Graduate_students') }}
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="Graduate students" class="collapse">
                                            @can('اضافة تخرج الطلاب')
                                                <li> <a
                                                        href="{{ route('Promotions.Graudated') }}">{{ trans('main_siadebar_trans.add_Graduate') }}</a>
                                                </li>
                                            @endcan

                                            @can('قائمة تخرج الطلاب')
                                                <li> <a
                                                        href="{{ route('Promotions.Graduate') }}">{{ trans('main_siadebar_trans.list_Graduate') }}</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @elsecan('List Students')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                    class=" fa fa-mortar-board"></i>{{ trans('main_siadebar_trans.students') }}<div
                                    class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>

                            <ul id="students-menu" class="collapse">
                                @can('Student Informaion')
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#Student_information">{{ trans('main_siadebar_trans.Student_information') }}
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="Student_information" class="collapse">
                                            @can('List Student')
                                                <li> <a
                                                        href="{{ route('StudentsTableview') }}">{{ trans('main_siadebar_trans.students') }}</a>
                                                </li>
                                            @endcan

                                            @can('Add Student')
                                                <li> <a
                                                        href="{{ route('create') }}">{{ trans('main_siadebar_trans.Add_student') }}</a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </li>
                                @endcan

                                @can('Student Promotions')
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#Students_upgrade">{{ trans('main_siadebar_trans.Students_Promotions') }}
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="Students_upgrade" class="collapse">
                                            @can('Add Student Promotions')
                                                <li> <a
                                                        href="{{ route('Promotions.index') }}">{{ trans('main_siadebar_trans.promotions') }}</a>
                                                </li>
                                            @endcan

                                            @can('Student Promotion Department')
                                                <li> <a
                                                        href="{{ route('Promotions.create') }}">{{ trans('main_siadebar_trans.PromotionsStudents') }}</a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </li>
                                @endcan

                                @can('Student Graduate')
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#Graduate students">{{ trans('main_siadebar_trans.Graduate_students') }}
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="Graduate students" class="collapse">
                                            @can('Add Graduate')
                                                <li> <a
                                                        href="{{ route('Promotions.Graudated') }}">{{ trans('main_siadebar_trans.add_Graduate') }}</a>
                                                </li>
                                            @endcan

                                            @can('List Graduate')
                                                <li> <a
                                                        href="{{ route('Promotions.Graduate') }}">{{ trans('main_siadebar_trans.list_Graduate') }}</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @endcan


                    <!-- Accounts-->
                    @can('الحسابات')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                                <div class="pull-left"><i class="fa  fa-calculator"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Accounts') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                                @can('رسوم دراسية')
                                    <li><a href="{{ route('Fees.index') }}">
                                            {{ trans('main_siadebar_trans.Study_Fees') }}
                                        </a></li>
                                @endcan
                                @can('الفواتير')
                                    <li> <a
                                            href="{{ route('FeesInvoices.index') }}">{{ trans('main_siadebar_trans.Invoices') }}</a>
                                    </li>
                                @endcan

                                @can('قائمة سندات القبض')
                                    <li> <a
                                            href="{{ route('ReceiptStudent.index') }}">{{ trans('invoices_trans.receipt') }}</a>
                                    </li>
                                @endcan
                                @can('قائمة استثناء الرسوم')
                                    <li> <a
                                            href="{{ route('ProccessingFeesStudent.index') }}">{{ trans('invoices_trans.excludefee') }}</a>
                                    </li>
                                @endcan
                                @can('قائمة سندات الصرف')
                                    <li> <a
                                            href="{{ route('Payment.index') }}">{{ trans('invoices_trans.voucherofexchange') }}</a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @elsecan('Acoounts')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                                <div class="pull-left"><i class="fa  fa-calculator"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Accounts') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                                @can('Study Fees')
                                    <li><a href="{{ route('Fees.index') }}">
                                            {{ trans('main_siadebar_trans.Study_Fees') }}
                                        </a></li>
                                @endcan
                                @can('Invoices')
                                    <li> <a
                                            href="{{ route('FeesInvoices.index') }}">{{ trans('main_siadebar_trans.Invoices') }}</a>
                                    </li>
                                @endcan

                                @can('List of Receipt')
                                    <li> <a
                                            href="{{ route('ReceiptStudent.index') }}">{{ trans('invoices_trans.receipt') }}</a>
                                    </li>
                                @endcan
                                @can('List of Voucher of Exchange')
                                    <li> <a
                                            href="{{ route('ProccessingFeesStudent.index') }}">{{ trans('invoices_trans.excludefee') }}</a>
                                    </li>
                                @endcan
                                @can('List of Voucher of Exchange')
                                    <li> <a
                                            href="{{ route('Payment.index') }}">{{ trans('invoices_trans.voucherofexchange') }}</a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @endcan



                    <!-- Attendance-->
                    @can('الحضور والغياب')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-menu">
                                <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Attendance') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة الحضور والغياب')
                                <ul id="Attendance-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('Attendance.index') }}">
                                            {{ trans('main_siadebar_trans.Attendance') }} </a></li>
                                </ul>
                            @endcan
                        </li>
                    @elsecan( 'Attendance')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-menu">
                                <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Attendance') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of Attendance')
                                <ul id="Attendance-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('Attendance.index') }}">
                                            {{ trans('main_siadebar_trans.Attendance') }} </a></li>
                                </ul>
                            @endcan
                        </li>
                    @endcan

                    <!-- Subject-->
                    @can('المواد')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subject-menu">
                                <div class="pull-left"><i class="fa fa-book" aria-hidden="true"></i> <span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Subject') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة المواد')
                                <ul id="Subject-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('Subject.index') }}">
                                            {{ trans('main_siadebar_trans.Subject') }} </a></li>
                                </ul>
                            @endcan
                        </li>
                    @elsecan( 'Subjects')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subject-menu">
                                <div class="pull-left"><i class="fa fa-book" aria-hidden="true"></i> <span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Subject') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List Subjects')
                                <ul id="Subject-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('Subject.index') }}">
                                            {{ trans('main_siadebar_trans.Subject') }} </a></li>
                                </ul>
                            @endcan
                        </li>
                    @endcan


                    <!-- Exams-->
                    @can('جدول امتحانات الفصل الدراسي')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-menu">
                                <div class="pull-left"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Exams') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة جدول امتحانات الفصل الدراسي')
                                <ul id="Exams-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('Exams.index') }}">
                                            {{ trans('main_siadebar_trans.Exams') }} </a>
                                    </li>
                                </ul>
                            @endcan

                        </li>
                    @elsecan('Semester Exam Schedule')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-menu">
                                <div class="pull-left"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Exams') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List Semester Exam Schedule')
                                <ul id="Exams-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('Exams.index') }}">
                                            {{ trans('main_siadebar_trans.Exams') }} </a>
                                    </li>
                                </ul>
                            @endcan

                        </li>
                    @endcan



                    <!-- Quizzes-->
                    @can('الاختبارات')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizzes-menu">
                                <div class="pull-left"><i class="fa fa-leanpub"></i> <span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Quizzes') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Quizzes-menu" class="collapse" data-parent="#sidebarnav">
                                @can('قائمة الاختبارات')
                                    <li><a href="{{ route('Quizzes.index') }}">
                                            {{ trans('main_siadebar_trans.Quizzes') }} </a></li>
                                @endcan
                                @can('الاسئلة')
                                    <li><a href="{{ route('Questions.index') }}">
                                            {{ trans('main_siadebar_trans.Questions') }}
                                        </a></li>
                                @endcan
                            </ul>

                        </li>
                    @elsecan('Quizzes')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizzes-menu">
                                <div class="pull-left"><i class="fa fa-leanpub"></i> <span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Quizzes') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Quizzes-menu" class="collapse" data-parent="#sidebarnav">
                                @can('List of Quizzes')
                                    <li><a href="{{ route('Quizzes.index') }}">
                                            {{ trans('main_siadebar_trans.Quizzes') }} </a></li>
                                @endcan
                                @can('Questions')
                                    <li><a href="{{ route('Questions.index') }}">
                                            {{ trans('main_siadebar_trans.Questions') }}
                                        </a></li>
                                @endcan
                            </ul>

                        </li>
                    @endcan


                    <!--Avarege-->
                    @can('علامات الطلاب وحساب المعدل')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Avarege-menu">
                                <div class="pull-left"><i class="fa fa-line-chart" aria-hidden="true"></i> <span
                                        class="right-nav-text">{{ trans('students_trans.AVG') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة علامات الطلاب وحساب المعدل')
                                <ul id="Avarege-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('StudentsAvarege.index') }}">
                                            {{ trans('students_trans.SMAG') }}</a></li>
                                </ul>
                            @endcan


                        </li>
                    @elsecan('Students marks and GPA')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Avarege-menu">
                                <div class="pull-left"><i class="fa fa-line-chart" aria-hidden="true"></i> <span
                                        class="right-nav-text">{{ trans('students_trans.AVG') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of Students marks and GPA')
                                <ul id="Avarege-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('StudentsAvarege.index') }}">
                                            {{ trans('students_trans.SMAG') }}</a></li>
                                </ul>
                            @endcan
                        </li>
                    @endcan

                    <!-- Online classes-->
                    @can('حصص الاونلاين')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                                <div class="pull-left"><i class="fa fa-video-camera" aria-hidden="true"></i> </i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Onlineclasses') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('غرف الإجتماعات')
                                <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{ route('Zoom.index') }}">
                                            {{ trans('main_siadebar_trans.Zoom') }}
                                        </a> </li>
                                </ul>
                            @endcan

                        </li>
                    @elsecan('Online classes')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                                <div class="pull-left"><i class="fa fa-video-camera" aria-hidden="true"></i> </i><span
                                        class="right-nav-text">{{ trans('main_siadebar_trans.Onlineclasses') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('Meeting rooms')
                                <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{ route('Zoom.index') }}">
                                            {{ trans('main_siadebar_trans.Zoom') }}
                                        </a> </li>
                                </ul>
                            @endcan

                        </li>
                    @endcan


                    <!-- Libarary-->
                    @can('المكتبة')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                                <div class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </i><span class="right-nav-text">{{ trans('main_siadebar_trans.library') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('قائمة المكتبة')
                                <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{ route('Library.index') }}">
                                            {{ trans('main_siadebar_trans.library') }} </a> </li>
                                </ul>
                            @endcan

                        </li>
                    @elsecan('Library')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                                <div class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </i><span class="right-nav-text">{{ trans('main_siadebar_trans.library') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('List of Library')
                                <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{ route('Library.index') }}">
                                            {{ trans('main_siadebar_trans.library') }} </a> </li>
                                </ul>
                            @endcan

                        </li>
                    @endcan

                    {{-- permission  --}}
                    @can('المستخدمين')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#User-icon">
                                <div class="pull-left"><i class="fa fa-user" aria-hidden="true"></i>
                                    </i><span class="right-nav-text">{{ trans('users_trans.Users') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="User-icon" class="collapse" data-parent="#sidebarnav">
                                @can('قائمة المستخدمين')
                                    <li> <a href="{{ route('users.index') }}">
                                            {{ trans('users_trans.Users') }}</a> </li>
                                @endcan
                                @can('الصلاحيات')
                                    <li><a href="{{ route('roles.index') }}">
                                            {{ trans('users_trans.Permissions') }}</a> </li>
                                @endcan
                            </ul>
                        </li>
                    @elsecan('Users')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#User-icon">
                                <div class="pull-left"><i class="fa fa-user" aria-hidden="true"></i>
                                    </i><span class="right-nav-text">{{ trans('users_trans.Users') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="User-icon" class="collapse" data-parent="#sidebarnav">
                                @can('List of Users')
                                    <li> <a href="{{ route('users.index') }}">
                                            {{ trans('users_trans.Users') }}</a> </li>
                                @endcan
                                @can('User Permissions')
                                    <li> <a href="{{ route('roles.index') }}">
                                            {{ trans('users_trans.Permissions') }}</a> </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan


                    <!-- Home Page Setting -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">{{ trans('main_siadebar_trans.PageSettings') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#news">{{ trans('news_trans.News') }}<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="news" class="collapse">
                                    <li> <a  href="{{ route('News.index') }}">{{ trans('news_trans.schoolnews') }}</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#events">{{ trans('Events_trans.Events') }}<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="events" class="collapse">
                                    <li> <a href="{{ route('Events.index') }}">{{ trans('Events_trans.EventsSchool') }}</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <!---SMS--->
                    <li>
                        <a href="{{ route('SMS.index') }}">
                            <i class="fa fa-envelope-o"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.SMS') }}</span> </a>
                    </li>


                    @can('السنة الاكاديمية')
                        <li>
                            <a href="{{ route('Academicyear.index') }}">
                                <i class="fa fa-list-ol" aria-hidden="true"></i>
                                <span class="right-nav-text">{{ trans('exams_trans.academic_year') }}</span> </a>
                        </li>
                    @elsecan('Academic Year')
                        <li>
                            <a href="{{ route('Academicyear.index') }}">
                                <i class="fa fa-list-ol" aria-hidden="true"></i>
                                <span class="right-nav-text">{{ trans('exams_trans.academic_year') }}</span> </a>
                        </li>
                    @endcan



                    <!-- Setting-->
                    @can('الاعدادات')
                        <li>
                            <a href="{{ route('settings.index') }}">
                                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                                <span class="right-nav-text">{{ trans('main_siadebar_trans.Settings') }}</span> </a>
                        </li>
                    @elsecan('Settings')
                        <li>
                            <a href="{{ route('settings.index') }}">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <span class="right-nav-text">{{ trans('main_siadebar_trans.Settings') }}</span> </a>
                        </li>
                    @endcan

                </ul>
                </li>
                </ul>
            </div>
        </div>



        <!-- Left Sidebar End-->

        <!--=================================
