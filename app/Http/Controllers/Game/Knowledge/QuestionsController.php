<?php

namespace App\Http\Controllers\Game\Knowledge;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class QuestionsController extends Controller
{
    public function saveQuiz(Request $request)
    {
        if ($request->Subject && $request->Quiz && $request->Asw1 && $request->Asw2 && $request->Asw3 && $request->Asw4 && $request->CorrectAsw) {
            $quiz = new Question();

            $quiz->subject = $request->Subject;
            $quiz->quiz = $request->Quiz;
            $quiz->answer1 = $request->Asw1;
            $quiz->answer2 = $request->Asw2;
            $quiz->answer3 = $request->Asw3;
            $quiz->answer4 = $request->Asw4;
            $quiz->correct = $request->CorrectAsw;
            $quiz->user_id = $request->user()->id;
            $quiz->save();
            if ($quiz) {
                return response()->json([
                    'massage' => "Save Successfull",
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'massage' => "Save Error",
                ]);
            }
        } else {
            return response()->json([
                'massage' => "All field required",
            ]);
        }
    }
    public function getQuiz()
    {
        $question = Question::orderBy('created_at', 'desc')->paginate(10);
        if ($question) {
            return response()->json([
                'question' => $question,
                'status' => "200",
            ]);
        } else {
            return response()->json([
                'massage' => "no question",
                'status' => "204",
            ]);
        }
    }
    public function editQuiz(Request $request)
    {
        $question = Question::where('id', $request->QuizId)->first();

        $question->subject = $request->Subject;
        $question->quiz = $request->Quiz;
        $question->answer1 = $request->Asw1;
        $question->answer2 = $request->Asw2;
        $question->answer3 = $request->Asw3;
        $question->answer4 = $request->Asw4;
        $question->correct = $request->CorrectAsw;
        $question->approved = "0";
        $question->save();

        if ($question) {
            return response()->json([
                'status' => 200,
                'massage' => "Update Successfully",
            ]);
        } else {
            return response()->json([
                'status' => 204,
                'massage' => "Update error",
            ]);
        }
    }
    public function quizApproved(Request $request)
    {
        $question = Question::where('id', $request->ApprovedId)->first();
        $question->approved = "1";
        $question->save();

        if ($question) {
            return response()->json([
                'status' => 200,
                'massage' => "Update Successfully",
            ]);
        } else {
            return response()->json([
                'status' => 204,
                'massage' => "Update error",
            ]);
        }
    }
    public function getUserQuiz(Request $request)
    {
        $question = Question::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $questionArray = $question['0'];
        if ($questionArray) {
            return response()->json([
                'question' => $question,
                'status' => "200",
            ]);
        } else {
            return response()->json([
                'massage' => "no question",
                'status' => "204",
            ]);
        }
    }
    public function getUserQuizIct(Request $request)
    {
        $question = Question::where('user_id', $request->user()->id)->where('subject', 'ict')->orderBy('created_at', 'desc')->paginate(10);
        $questionArray = $question['0'];
        if ($questionArray) {
            return response()->json([
                'question' => $question,
                'status' => "200",
            ]);
        } else {
            return response()->json([
                'massage' => "no question",
                'status' => "204",
            ]);
        }
    }
    public function getUserQuizMaths(Request $request)
    {
        $question = Question::where('user_id', $request->user()->id)->where('subject', 'maths')->orderBy('created_at', 'desc')->paginate(10);
        $questionArray = $question['0'];
        if ($questionArray) {
            return response()->json([
                'question' => $question,
                'status' => "200",
            ]);
        } else {
            return response()->json([
                'massage' => "no question",
                'status' => "204",
            ]);
        }
    }
    public function getUserQuizScience(Request $request)
    {
        $question = Question::where('user_id', $request->user()->id)->where('subject', 'science')->orderBy('created_at', 'desc')->paginate(10);
        $questionArray = $question['0'];
        if ($questionArray) {
            return response()->json([
                'question' => $question,
                'status' => "200",
            ]);
        } else {
            return response()->json([
                'massage' => "no question",
                'status' => "204",
            ]);
        }
    }
}
