<div>
    <div>
        <div class="card card-statistics mb30">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $data[$counter]->title }}
                </h5>
                @foreach (preg_split('/(-)/', $data[$counter]->answers) as $index => $answer)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1{{ $index }}"
                            wire:click="nextQuestion({{ $data[$counter]->id }} , {{ $data[$counter]->score }} , '{{ $answer }}' ,'{{ $data[$counter]->right_answer }}')"
                            inh>
                        <label class="form-check-lable" for="gridRadios1{{ $index }}">{{ $answer }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
