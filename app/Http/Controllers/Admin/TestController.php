<?php

namespace App\Http\Controllers\Admin;

use App\Test;
use App\TestAnswer;
use App\TestQuestion;
use App\TestType;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Question\Question;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('admin.tests.index', ['tests' => $tests]);
    }

    public function getTypeTestAll()
    {
        $testsType = TestType::all();
        return view('admin.tests.create', ['testsType' => $testsType]);
    }

    public function createTest(Request $request, $id)
    {
        $test = new Test();
        $test->name = $request->name;
        $test->short_description = $request->short_description;
        $test->description = $request->description;
        $test->test_type_id = $id;
//        $test->condition = '';
        $test->save();
        return redirect()->route('admin.test.index');
    }

    public function addQuestion(Request $request, $id)
    {
        $test_question = new TestQuestion();
        $test_question->test_id = $id;
        $test_question->name = $request->question;
        $test_question->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $test = Test::find($id);
        $test_questions = TestQuestion::where('test_id', $test->id)->get();

        switch ($test->test_type_id) {
            case 1:
                return view('admin.tests.edit.test1', [
                    'test' => $test,
                    'test_questions' => $test_questions
                ]);
            case 2:
                return view('admin.tests.edit.test2', [
                    'test' => $test,
                    'test_questions' => $test_questions
                ]);
            case 3:
                return view('admin.tests.edit.test3', [
                    'test' => $test,
                    'test_questions' => $test_questions
                ]);
        }
    }

    public function updateBase(Request $request, $id)
    {
        $test = Test::find($id);
        $test->name = $request->name;
        $test->short_description = $request->short_description;
        $test->description = $request->description;
        $test->price = $request->price;
        $test->update();
        return redirect()->back();
    }

    public function updateCondition(Request $request, $id)
    {
        $test = Test::find($id);
        $test->condition = serialize($request->condition);
        $test->save();
        return redirect()->back();
    }

    public function updateQuestion(Request $request, $id)
    {
        $test = TestQuestion::find($id);
        $test->name = $request->name;
        $test->weight = $request->weight;
        $test->update();
        return redirect()->back();
    }

    public function updateSeo(Request $request, $id)
    {
        $test = Test::find($id);
//        dd($request->all());
        $test->fill($request->all());
        $test->update();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();
        TestQuestion::where('test_id', $id)->delete();
        return redirect()->back();
    }

    public function destroyQuestion($id)
    {
        TestQuestion::find($id)->delete();
        return redirect()->back();
    }

    public function getInfo($id)
    {
        $testsAnswer = TestAnswer::where('test_order_id', $id)->get();
        $sum = 0;
        foreach ($testsAnswer as $testAnswer) {
            $sum += $testAnswer->rating;
        }
        $avgRating = $sum / count($testsAnswer);
        return view('admin.order.resultInfo', ['testsAnswer' => $testsAnswer, 'avgRating' => $avgRating]);
    }

}
