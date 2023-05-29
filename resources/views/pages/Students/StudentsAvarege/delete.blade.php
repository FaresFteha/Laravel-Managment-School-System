<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{$StudentAverage->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('grades_trans.Delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{  route('StudentsAvarege.destroy' , 'test' ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$StudentAverage->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('invoices_trans.Deleteok') }}</h5>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  type="submit"  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>