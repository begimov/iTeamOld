<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mark;
use App\MarkResource;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::all();
        return view('admin.mark.index', [
            'marks' => $marks
        ]);
    }

    public function store(Request $request)
    {
        $mark = new Mark();
        $mark->name = $request->name;
        $mark->slug = str_slug($request->name);
        $mark->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Mark::find($id)->delete();
        return redirect()->back();
    }

//    public function addMark(Request $request)
//    {
//        dd($request);
//        $find = MarkResource::where('type_resource', $request->type_resource)
//            ->where('id_resource', $request->id_resource)
//            ->where('id_mark', $request->id_mark)
//            ->first();
//
//        if ($find == null) {
//            $markResource = new MarkResource();
//            $markResource->type_resource = $request->type_resource;
//            $markResource->id_resource = $request->id_resource;
//            $markResource->id_mark = $request->id_mark;
//            $markResource->save();
//            return redirect()->back()->with('status', 'Успешно добавленно');
//        }
//        return redirect()->back()->with('error', 'Уже существует');
//    }

    public function addMark(Request $request)
    {
        $marks = $request->id_mark;
        if (count($marks) == 0)
        {
            return redirect()->back();
        }

        foreach ($marks as $mark)
        {
            $find = MarkResource::where('type_resource', $request->type_resource)
                ->where('id_resource', $request->id_resource)
                ->where('id_mark', $mark)
                ->first();

            if ($find == null) {
                $markResource = new MarkResource();
                $markResource->type_resource = $request->type_resource;
                $markResource->id_resource = $request->id_resource;
                $markResource->id_mark = $mark;
                $markResource->save();
            }
        }
        return redirect()->back();
    }

    public function destroyMark($id)
    {
        MarkResource::find($id)->delete();
        return redirect()->back();
    }
}
