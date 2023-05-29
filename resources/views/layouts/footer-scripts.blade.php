<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->

<script type="text/javascript">
    var plugin_path = '{{ asset('assets/js') }}/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->

<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

<script>
    const userId = "{{ Auth::id() }}";
</script>

<!-- Scripts -->
<script src="{{ URL::asset('js/app.js') }}"></script>


{{-- Checked cheakbox if selected or not selected and delete selected --}}
<script type="text/javascript">
    function CheckAll(classame, elem) {
        var elements = document.getElementsByClassName(classame);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;

            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;

            }

        }
    }
</script>

<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#DeleteCheck input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>

{{-- Checked cheakbox if selected or not selected --}}

{{-- Scripts click relashinship --}}

<script>
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var Grade_id = $(this).val();
            //  alert(Grade_id);
            // alert('fatresfffff'  +  SectionId);
            if (Grade_id) {
                $.ajax({
                    url: "{{ route('get_Classes') }}",
                    type: "get",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': Grade_id
                    },

                    success: function(data) {
                        $('#Classroom_id').html(data);
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });
</script>


<script>
    $(document).ready(function() {
        $('select[name="Grades_id"]').on('change', function() {
            var Grades_id = $(this).val();
            //  alert(Grade_id);
            // alert('fatresfffff'  +  SectionId);
            if (Grade_id) {
                $.ajax({
                    url: "{{ route('get_Classes') }}",
                    type: "get",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': Grades_id
                    },

                    success: function(data) {
                        $('#classrooms_id').html(data);
                        //  $('select[name="product_name"]').empty();
                        /*
                         $.each(data, function(key, value) {
                              $('select[name="product_name"]').append('<option value="' +
                                  value + '">' + value + '</option>');
                                // alert("data");
                         });
                         */
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });
</script>


<script>
    $(document).ready(function() {
        $('select[name="Classroom_id"]').on('change', function() {
            var Classroom_id = $(this).val();
            //  alert(Grade_id);
            // alert('fatresfffff'  +  SectionId);
            if (Grade_id) {
                $.ajax({
                    url: "{{ route('get_Section') }}",
                    type: "get",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': Classroom_id
                    },

                    success: function(data) {
                        $('#section_id').html(data);
                        //  $('select[name="product_name"]').empty();
                        /*
                         $.each(data, function(key, value) {
                              $('select[name="product_name"]').append('<option value="' +
                                  value + '">' + value + '</option>');
                                // alert("data");
                         });
                         */
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });
</script>


<script>
    $(document).ready(function() {
        $('select[name="Grade_id_new"]').on('change', function() {
            var Grade_id = $(this).val();
            //  alert(Grade_id);
            // alert('fatresfffff'  +  SectionId);
            if (Grade_id) {
                $.ajax({
                    url: "{{ route('get_Classes') }}",
                    type: "get",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': Grade_id
                    },

                    success: function(data) {
                        $('#Classroom_id_new').html(data);
                        //  $('select[name="product_name"]').empty();
                        /*
                         $.each(data, function(key, value) {
                              $('select[name="product_name"]').append('<option value="' +
                                  value + '">' + value + '</option>');
                                // alert("data");
                         });
                         */
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('select[name="Classroom_id_new"]').on('change', function() {
            var Classroom_id = $(this).val();
            //  alert(Grade_id);
            // alert('fatresfffff'  +  SectionId);
            if (Grade_id) {
                $.ajax({
                    url: "{{ route('get_Section') }}",
                    type: "get",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': Classroom_id
                    },

                    success: function(data) {
                        $('#section_id_new').html(data);
                        //  $('select[name="product_name"]').empty();
                        /*
                         $.each(data, function(key, value) {
                              $('select[name="product_name"]').append('<option value="' +
                                  value + '">' + value + '</option>');
                                // alert("data");
                         });
                         */
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });
</script>
{{--  --}}
<script src="{{ asset('assets/bootstrap-fileinput/js/plugins/piexif.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-fileinput/js/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-fileinput/themes/fa/theme.min.js') }}"></script>


@yield('js')
