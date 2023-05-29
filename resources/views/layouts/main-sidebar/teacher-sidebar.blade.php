<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('Teacher.home') }}" data-target="#dashboard">
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


                    <!-- Sections-->
                    <li>
                        <a target="_blank" href="{{ route('Sections') }}">
                            <i class="fa fa-sort-alpha-asc"></i>
                            <span class="right-nav-text">{{ trans('dashpored.Sections') }}</span> </a>
                    </li>

                    <!-- Students-->
                    <li>
                        <a target="_blank" href="{{ route('Students.index') }}">
                            <i class=" fa fa-mortar-board"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.students') }}</span> </a>
                    </li>

                    <!-- الاختبارات-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizzes-menu">
                            <div class="pull-left"><i class="fa fa-archive" aria-hidden="true"></i>
                                <span class="right-nav-text">{{ trans('main_siadebar_trans.Quizzesas') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Quizzes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('quizzes.index') }}">{{ trans('main_siadebar_trans.Quizzesas') }}</a>
                            </li>
                        </ul>

                    </li>




                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Reports-menu">
                            <div class="pull-left"><i class="fa fa-filter" aria-hidden="true"></i>
                                <span class="right-nav-text">{{ trans('attendance_trans.Reports') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Reports-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a
                                    href="{{ route('Attendance.report') }}">{{ trans('attendance_trans.Attendancereports') }}</a>
                            </li>
                            <li><a href="{{ route('Exam.report') }}">{{ trans('attendance_trans.Examreportst') }} </a></li>
                        </ul>

                    </li>

                    <!-- Online classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fa fa-video-camera" aria-hidden="true"></i> </i><span
                                    class="right-nav-text">{{ trans('main_siadebar_trans.Onlineclasses') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('zoom.index') }}">{{ trans('main_siadebar_trans.Zoom') }}</a> </li>
                        </ul>
                    </li>

                    <!-- Setting-->
                    <li>
                        <a href="{{ route('Profile.index') }}">
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
