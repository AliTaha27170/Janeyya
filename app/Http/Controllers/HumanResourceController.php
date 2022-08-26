<?php

namespace App\Http\Controllers;

use App\Http\Traits\AttachFilesTrait;
use App\HumanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class HumanResourceController extends Controller
{
    use AttachFilesTrait;
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
        if(Auth::user()->role == 2){
            $review->review = 1;
        }
        if(Auth::user()->role == 3){
            
            $review->review_user = 1;
            $review->save();
            return redirect()->route('humanResources.index');
        }
        
        $review->save();
        $humanResource = HumanResource::where('id',$id)->first();
        return view('humanResources.edit', compact('humanResource'));
    }
    public function update(Request $request)
    {
        $humanResource = HumanResource::findorFail($request->id);
        $humanResource->status = $request->status;
        $humanResource->file_name =  $request->file('file_name')->getClientOriginalName();
        $humanResource->status_discription = $request->status_discription;
        $humanResource->save();
        $this->uploadFile($request,'file_name');
        return redirect()->back()->with("msg", "تمت التحديث بنجاح .");
    }
    public function downloadFile ($filename)
    {
        return response()->download(public_path() . '/attachments/' . $filename);
    }
    
}
