<div class="table-responsive">
    {{-- Message --}}
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    {{-- Message --}}

    {{-- Message catchError --}}
    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif
    {{-- Message catchError --}}

    @can('اضافة اولياء الامور')
        <button class="button x-small  pull-right" wire:click="showformadd"
            type="button">{{ trans('parent_trans.add_parent') }}</button>
    @elsecan('Add Parents')
        <button class="button x-small  pull-right" wire:click="showformadd"
            type="button">{{ trans('parent_trans.add_parent') }}</button>
    @endcan

    <br>
    <br>
    <br>

    <div class="widget-search ml-0 clearfix">
        <i class="fa fa-search"></i>
        <input type="text" wire:model="keyword" value="{{ old('keyword', request()->input('keyword')) }}"
            class="form-control" placeholder="{{ trans('extra_trans.Search_here') }}">
    </div>
    <br>


    <table class="table  table-hover table-bordered p-0" style="text-align: center">
        <thead>
            <tr class="table-success">
                <th>#</th>
                <th>{{ trans('Parent_trans.Email') }}</th>
                <th>{{ trans('Parent_trans.Name_Father') }}</th>
                <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
                <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                <th>{{ trans('Parent_trans.Job_Father') }}</th>
                <th>{{ trans('Parent_trans.Processes') }}</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($my_parents as $my_parent)
                <tr>

                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $my_parent->email }}</td>
                    <td>{{ $my_parent->Name_Father }}</td>
                    <td>{{ $my_parent->National_ID_Father }}</td>
                    <td>{{ $my_parent->Passport_ID_Father }}</td>
                    <td>{{ $my_parent->Phone_Father }}</td>
                    <td>{{ $my_parent->Job_Father }}</td>
                    <td>
                        @can('تعديل اولياء الامور')
                        <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        @elsecan('Edit Parents')
                        <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        @endcan

                        @can('حذف اولياء الامور')
                        <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})"
                            title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                        @elsecan('Delete Parents')
                        <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})"
                            title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                        @endcan

                    </td>
                </tr>
            @endforeach
    </table>
    <div>
        <tfoot>
            <tr>
                <td colspan="4">
                    <div class="float-right">
                        {!! $my_parents->appends(request()->all())->links() !!}
                    </div>
                </td>
            </tr>
        </tfoot>
    </div>
</div>
