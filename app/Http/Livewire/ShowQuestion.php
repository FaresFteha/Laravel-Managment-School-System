<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Question;
use Livewire\Component;

class ShowQuestion extends Component
{
  public $quizze_id,
    $student_id,
    $data,
    $counter = 0,
    $questioncount = 0;

  public function render()
  {
    // get all questions for this quiz
    $this->data = Question::where('quizze_id', $this->quizze_id)->get();

    // count the number of questions
    $this->questioncount = $this->data->count();

    // load the view to display the questions
    return view('livewire.show-question', ['data']);
  }


  public function nextQuestion($question_id, $score, $answer, $right_answer)
  {
    // Get the degree record for the student and quiz
    $stuDegree = Degree::where('student_id', $this->student_id)
      ->where('quizze_id', $this->quizze_id)
      ->first();

    // If no degree record found, create a new one
    if ($stuDegree == null) {
      $degree = new Degree();
      $degree->quizze_id = $this->quizze_id;
      $degree->student_id = $this->student_id;
      $degree->question_id = $question_id;

      // Check if answer is correct, and update score accordingly
      if (strcmp(trim($answer), trim($right_answer)) === 0) {
        $degree->score += $score;
      } else {
        $degree->score += 0;
      }

      // Set date to current date and save degree record
      $degree->date = date('Y-m-d');
      $degree->save();
    }
    // If degree record exists, update it with new question and score
    else {
      // If student already answered a later question, cancel exam
      if ($stuDegree->question_id >= $this->data[$this->counter]->id) {
        $stuDegree->score = 0;
        $stuDegree->abuse = '1';
        $stuDegree->save();
        toastr()->error(trans('meesageop.exam'));
        return redirect('Student_Exams');
      }
      // Otherwise, update degree record with new score and question
      else {
        $stuDegree->question_id = $question_id;

        // Check if answer is correct, and update score accordingly
        if (strcmp(trim($answer), trim($right_answer)) === 0) {
          $stuDegree->score += $score;
        } else {
          $stuDegree->score += 0;
        }

        // Save the degree record
        $stuDegree->save();
      }
    }

    // If there are more questions in the quiz, move to the next question
    if ($this->counter < $this->questioncount - 1) {
      $this->counter++;
    }
    // If this was the last question, show success message and redirect to exams page
    else {
      toastr()->success(trans('meesageop.success'));
      return redirect('Student_Exams');
    }
  }
}
