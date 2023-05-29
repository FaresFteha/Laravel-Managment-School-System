<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('Home.Parent') }}" data-target="#dashboard">
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



                    <!--Childrens-->
                    <li>
                        <a href="{{ route('Sons.index') }}">
                            <i class="fa fa-street-view" aria-hidden="true"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.sons') }}</span> </a>
                    </li>


                    <!--Childrens-->
                    <li>
                        <a href="{{route('Sons.attendances')}}">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.absencereport') }}</span> </a>
                    </li>


                    <!--Childrens-->
                    <li>
                        <a href="{{route('Sons.Fees') }}">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            <span class="right-nav-text">{{ trans('main_siadebar_trans.financialreport') }}</span> </a>
                    </li>

                    <!-- Setting-->
                    <li>
                        <a href="{{ route('Profile.show.paren') }}">
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
