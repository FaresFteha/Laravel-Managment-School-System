<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('Home.Student') }}" data-target="#dashboard">
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




                    {{-- <!-- Exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-menu">
                            <div class="pull-left"><i class="fa fa-leanpub"></i> <span
                                    class="right-nav-text">{{ trans('main_siadebar_trans.Exams') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Exams.index') }}">
                                    {{ trans('main_siadebar_trans.Exams') }} </a></li>
                        </ul>
                    </li> --}}

                    <!--Exams-->
                    <li>
                        <a href="{{ route('Student_Exams.index') }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.Quizzes') }}</span> </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-menu">
                            <div class="pull-left"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span
                                    class="right-nav-text">{{ trans('main_siadebar_trans.Exams') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="Exams-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Student.examsSchedule') }}">
                                    {{ trans('main_siadebar_trans.Exams') }} </a>
                            </li>
                        </ul>


                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Avarege-menu">
                            <div class="pull-left"><i class="fa fa-line-chart" aria-hidden="true"></i> <span
                                    class="right-nav-text">{{ trans('students_trans.AVG') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="Avarege-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{ route('Student.semesterMarks') }}">
                                    <span class="right-nav-text">{{ trans('students_trans.smessterexam') }}</span> </a>
                            </li>
                            <li><a href="{{ route('Student.Avareg') }}">
                                    {{ trans('students_trans.Avareg') }}</a></li>
                        </ul>



                    </li>

                    <li>
                        <a href="{{ route('Student.books') }}">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <span class="right-nav-text"> {{ trans('main_siadebar_trans.library') }}</span> </a>
                    </li>

                    
                    <li>
                        <a href="{{ route('Student.Zoom') }}">
                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.Zoom') }}</span> </a>
                    </li>


                    <!-- Setting-->
                    <li>
                        <a href="{{ route('Profile.Student') }}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.Settings') }}</span> </a>
                    </li>


                </ul>
                </li>
                </ul>
            </div>
        </div>



        <!-- Left Sidebar End-->

        <!--=================================
