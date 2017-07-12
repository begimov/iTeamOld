<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MarkResource;
use App\Mark;

class MarkController extends Controller
{
    public function getList($id)
    {
        $mark = Mark::find($id);
//        $marks = MarkResource::where('id_mark', $id)->get();
        $marks = MarkResource::where('id_mark', $id)->paginate(10);

        return view('iteam.search_mark', [
            'mark' => $mark,
            'marks' => $marks
        ]);
    }
}
