<div>
    
    {{-- Message 
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    {{-- Message   

    {{-- Message catchError  
    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif
    {{-- Message catchError 
    --}}

    <div>
        @if (session()->has('message'))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('message') }}
        </div>
        @endif
    </div>
    
    @if ($show_table)
        @include('livewire.Parent_Table')
    @else
        {{-- stepwizard-step --}}
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    {{-- #step-1 --> معلومات الاب --}}
                    <a href="#step-1" type="button" {{-- $currentStep-> متغير في الكلاس الاد بارينت 
                انو اول ا تفتح الصفحة هاتلي اول واجهة --}}
                        class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ trans('Parent_trans.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    {{-- #step-2 --> معلومات الام --}}
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('Parent_trans.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    {{-- #step-3 --> تاكيد معلومات --}}
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                        disabled="disabled">3</a>
                    <p>{{ trans('Parent_trans.Step3') }}</p>
                </div>
            </div>
        </div>
        {{-- stepwizard-step --}}

        @include('livewire.Father_Form')
        @include('livewire.Mother_Form')
    @endif








    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12"><br>
                <h3 style="font-family: 'Cairo', sans-serif;">{{ trans('parent_trans.Step3') }}</h3><br>
                {{-- Drop Atachment --}}
                <label style="color: red">{{ trans('parent_trans.Attachments') }}</label>
                <div class="form-group">
                    <input type="file" wire:model="photos" accept="image/*" multiple>
                </div>
                {{-- Drop Atachment --}}
                <br>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(2)">{{ trans('parent_trans.Back') }}</button>

                @if ($updateMode)
                    <button class="btn btn-success nextBtn btn-lg pull-right" style="margin-right: 5px" wire:click="submitForm_edit"
                        type="button">{{ trans('parent_trans.Finish') }}
                    </button>
                @else
                    <button class="btn btn-success  btn-lg pull-right" wire:click="submitForm"
                        type="button">{{ trans('parent_trans.Finish') }}</button>
                @endif

            </div>
        </div>

    </div>
</div>
</div>
