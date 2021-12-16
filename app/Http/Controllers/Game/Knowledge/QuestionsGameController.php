<?php

namespace App\Http\Controllers\Game\Knowledge;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Coin;
use App\Models\Question;
use App\Models\QuizResult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionsGameController extends Controller
{
    public function getQuiz(Request $request)
    {
        $balance = Balance::where('user_id', $request->user()->id)->first();
        if ($balance->gc >= $request->stake) {
            $Quiz = QuizResult::where('user_id', $request->user()->id)->where('subject', $request->subject)->latest()->first();
            $QuizCount = $Quiz;
            if ($Quiz && $Quiz->day_counter < 10) {
                if ($Quiz->id) {
                    $question = Question::where('id', '>', $Quiz->question_id)->where('subject', $request->subject)->where('approved', 1)->first();
                    if ($question) {

                        $balance->gc = $balance->gc - $request->stake;
                        $balance->save();

                        $Quiz = new QuizResult();

                        $Quiz->user_id = $request->user()->id;
                        $Quiz->stake = $request->stake;
                        $Quiz->question_id = $question->id;
                        $Quiz->subject = $request->subject;
                        $Quiz->day_counter = $QuizCount->day_counter + 1;
                        $Quiz->answer = "0";
                        $Quiz->result = "0";
                        $Quiz->save();
                        return response()->json([
                            'quiz' => $question->quiz,
                            'ans1' => $question->answer1,
                            'ans2' => $question->answer2,
                            'ans3' => $question->answer3,
                            'ans4' => $question->answer4,
                            'quizresultid' => $Quiz->id,
                            'questionid' => $question->id,
                            'status' => 200,
                        ]);
                    } else {
                        return response()->json([
                            'Quiz' => $Quiz,
                            'massage' => "No Question",
                            // 'massage' => $Quiz,
                            // 'question' => $question,
                            'status' => 201,
                        ]);
                    }
                }
            } else {
                if ($Quiz) {
                    $today = Carbon::today();
                    $todayConvert = Carbon::createFromFormat('Y-m-d H:i:s', $today)->format('d-m-Y');
                    $QuizDate = Carbon::createFromFormat('Y-m-d H:i:s', $Quiz->updated_at)->format('d-m-Y');
                    if ($todayConvert === $QuizDate) {
                        return response()->json([
                            'date' => $QuizDate,
                            'massage' => "Try again tomorrow",
                            'status' => 204,
                        ]);
                    } else {
                        $question = Question::where('id', '>', $QuizCount->question_id)->where('subject', $request->subject)->where('approved', 1)->first();
                        if ($question) {
                            $balance->gc = $balance->gc - $request->stake;
                            $balance->save();

                            $Quiz = new QuizResult();
                            $Quiz->user_id = $request->user()->id;
                            $Quiz->stake = $request->stake;
                            $Quiz->question_id = $question->id;
                            $Quiz->subject = $request->subject;
                            $Quiz->day_counter = "1";
                            $Quiz->answer = "0";
                            $Quiz->result = "0";
                            $Quiz->save();

                            return response()->json([
                                'quiz' => $question->quiz,
                                'ans1' => $question->answer1,
                                'ans2' => $question->answer2,
                                'ans3' => $question->answer3,
                                'ans4' => $question->answer4,
                                'quizresultid' => $Quiz->id,
                                'questionid' => $question->id,
                                'status' => 200,
                            ]);
                        } else {
                            return response()->json([
                                'massage' => "somthing else",
                                'status' => 200,
                            ]);
                        }
                    }
                } else {
                    $balance->gc = $balance->gc - $request->stake;
                    $balance->save();

                    $question = Question::where('id', '>', '0')->where('subject', $request->subject)->where('approved', 1)->first();
                    if ($question) {
                        $Quiz = new QuizResult();
                        $Quiz->stake = $request->stake;
                        $Quiz->user_id = $request->user()->id;
                        $Quiz->question_id = $question->id;
                        $Quiz->subject = $request->subject;
                        $Quiz->day_counter = "1";
                        $Quiz->answer = "0";
                        $Quiz->result = "0";
                        $Quiz->save();

                        return response()->json([
                            'quiz' => $question->quiz,
                            'ans1' => $question->answer1,
                            'ans2' => $question->answer2,
                            'ans3' => $question->answer3,
                            'ans4' => $question->answer4,
                            'quizresultid' => $Quiz->id,
                            'questionid' => $question->id,
                            'status' => 200,
                        ]);
                    }


                    return response()->json([
                        'Quiz' => $Quiz,
                        'massage' => "No Question",
                        'status' => 201,
                    ]);
                }
            }
        } else {
            return response()->json([
                'massage' => "Low Balance",
                'status' => 204,
            ]);
        }
    }

    public function quizAnswer(Request $request)
    {
        $question = Question::where('id', $request->questionid)->first();
        if ($question) {
            $QuizResult = QuizResult::where('id', $request->quizResultid)->first();

            $nowsecound = Carbon::now()->timestamp;
            $todayConvert = $QuizResult->updated_at->timestamp + 15;
            if ($nowsecound < $todayConvert) {
                if ($QuizResult->user_id === $request->user()->id && $QuizResult->result !== "0") {
                    if ($request->correct === $question->correct) {
                        $balance = Balance::where('user_id', $request->user()->id)->first();
                        $balance->gc = $balance->gc + ($QuizResult->stake * 2);
                        $balance->save();

                        $QuizResult->result = 1;
                        $QuizResult->answer = $request->correct;
                        $QuizResult->save();

                        $coin = Coin::where('name', 'gsg')->first();
                        $coin->rate = $coin->rate + 1;
                        $coin->save();

                        return response()->json([
                            'time' => $nowsecound,
                            'times' => $todayConvert,
                            'massage' => "Great",
                            'status' => 200,
                        ]);
                    } else {
                        $QuizResult->result = 2;
                        $QuizResult->answer = $request->correct;
                        $QuizResult->save();

                        $coin = Coin::where('name', 'gsg')->first();
                        if ($coin->rate > 70) {
                            $coin->rate = $coin->rate - 1;
                            $coin->save();
                        }

                        return response()->json([
                            'time' => $nowsecound,
                            'times' => $todayConvert,
                            'massage' => "Incorrect Answer",
                            'status' => 200,
                        ]);
                    }
                }
                return response()->json([
                    'massage' => "Something else",
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'time' => $nowsecound,
                    'times' => $todayConvert,
                    'massage' => "Time Out",
                    'status' => 200,
                ]);
            }
        } else {
            return response()->json([
                'massage' => "It is id no question",
                'status' => 200,
            ]);
        }
    }
    public function test(Request $request)
    {
        // $Quiz = QuizResult::where('user_id', $request->user()->id)->get();
        $Quiz = QuizResult::join('questions', 'questions.id', '=', 'quiz_results.question_id')
            ->where('quiz_results.user_id', $request->user()->id)->first();
        return response()->json([
            'test' => $Quiz,
            'massage' => "test",
            'status' => 200,
        ]);
    }
}
