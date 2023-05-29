{{-- Admin-Main-Sidebar --}}
@if (auth('web')->check())
    @include('layouts.main-sidebar.admin-sidebar')
@endif

@if (auth('student')->check())
    @include('layouts.main-sidebar.student-sidebar')
@endif

@if (auth('teacher')->check())
    @include('layouts.main-sidebar.teacher-sidebar')
@endif

@if (auth('parent')->check())
    @include('layouts.main-sidebar.parent-sidebar')
@endif
