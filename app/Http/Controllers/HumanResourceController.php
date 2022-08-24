<?php

namespace App\Http\Controllers;

use App\HumanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HumanResourceController extends Controller
{
    public function index()
    {
        $humanResources = HumanResource::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('humanResources.index', compact('humanResources'));
    }

    public function store(Request $request)
    {
        $humanResource = new HumanResource();
        $humanResource->reason = $request->reason;
        $humanResource->reason_discription = $request->reason_discription;
        $humanResource->user_id = Auth::user()->id;
        $humanResource->save();
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $humanResource->addMediaFromRequest('file')->toMediaCollection('file');
        }
        return redirect()->back()->with("msg", "تمت الإضافة بنجاح .");
    }
    public function getReason()
    {
        $humanResources = HumanResource::orderBy('id','DESC')->get();
        return view('humanResources.all', compact('humanResources'));
    }
    public function edit($id)
    {
        $review = HumanResource::findorFail($id);
        $review->review = 1;
        $review->save();
        $humanResource = HumanResource::where('id',$id)->first();
        return view('humanResources.edit', compact('humanResource'));
    }
    public function update(Request $request)
    {
        $humanResource = HumanResource::findorFail($request->id);
        $humanResource->status = $request->status;
        $humanResource->status_discription = $request->status_discription;
        $humanResource->save();
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $humanResource->addMediaFromRequest('file')->toMediaCollection('file');
        }
        return redirect()->back()->with("msg", "تمت التحديث بنجاح .");
    }
}
