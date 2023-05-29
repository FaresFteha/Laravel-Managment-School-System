<div class="card-body">
    <form action="{{ route('ClassTableview') }}" method="get">
        <div class="row">
            <div class="d-block d-md-flex clearfix sm-mt-20">
                <div class="clearfix">
                    <div class="box">
                        <select name="sort_by" class="fancyselect sm-mb-20 mr-20">
                            <option value="">---</option>
                            <option value="id"
                                {{ old('sort_by', request()->input('sort_by')) == 'id' ? 'selected' : '' }}>
                                {{ trans('extra_trans.Number') }}</option>
                            <option value="name"
                                {{ old('sort_by', request()->input('sort_by')) == 'name' ? 'selected' : '' }}>
                                {{ trans('extra_trans.Name') }}</option>
                            <option value="created_at"
                                {{ old('sort_by', request()->input('sort_by')) == 'created_at' ? 'selected' : '' }}>
                                {{ trans('extra_trans.Creation_time') }}</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="box">
                        <select name="order_by" class="fancyselect sm-mb-20 mr-20">
                            <option value="">---</option>
                            <option value="asc"
                                {{ old('order_by', request()->input('order_by')) == 'asc' ? 'selected' : '' }}>
                                {{ trans('extra_trans.asc') }}</option>
                            <option value="desc"
                                {{ old('order_by', request()->input('order_by')) == 'desc' ? 'selected' : '' }}>
                                {{ trans('extra_trans.Descending') }}</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="box">
                        <select name="limit_by" class="fancyselect sm-mb-20 mr-20">
                            <option value="">---</option>
                            <option value="10"
                                {{ old('limit_by', request()->input('limit_by')) == '10' ? 'selected' : '' }}>10
                            </option>
                            <option value="20"
                                {{ old('limit_by', request()->input('limit_by')) == '20' ? 'selected' : '' }}>20
                            </option>
                            <option value="50"
                                {{ old('limit_by', request()->input('limit_by')) == '50' ? 'selected' : '' }}>50
                            </option>
                            <option value="100"
                                {{ old('limit_by', request()->input('limit_by')) == '100' ? 'selected' : '' }}>100
                            </option>
                        </select>
                    </div>
                </div>
                <div class="widget-search ml-0 clearfix">
                    <i class="fa fa-search"></i>
                    <input type="text" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}"
                        class="form-control" placeholder="{{ trans('extra_trans.Search_here') }}">
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <button type="submit" class="button">{{ trans('extra_trans.Search') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
