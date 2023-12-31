<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Batch;
use App\Models\Group;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('batch')->get();
        return view('admin.group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batches = Batch::all();

        return view('admin.group.create', compact('batches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $input = $request->validated();
        try{
            Group::create($input);
            return redirect()->route('group.list')->with('toast_success', 'Section Created Successfully');
        }catch( Exception $e){
            Log::error("Error while uploading group. Error report: ". $e);
            return redirect()->route('group.list')->with('toast_error', 'Oops! Error Occured. Please Try Again Later.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        $batches = Batch::all();
        return view('admin.group.edit', compact('group', 'batches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        $group = Group::findOrFail($id);
        $input = $request->validated();

        try{

            $group->update($input);
            return redirect()->route('group.list')->with('toast_success', 'Section Updated Successfully');

        }
        catch(Exception $e){
            Log::error("Error Occured while updating group. Error Report: ".$e);
            return redirect()->route('group.list')->with('toast_error', 'Oops!Error Occured. Please Try Again Later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $group = Group::findOrFail($id);
            $group->delete();
            return redirect()->route('group.list')->with('toast_success','Section Deleted Successfully');
        }catch( Exception $e){
            Log::error("Error while deleting group. Error report: ". $e);
            return redirect()->route('group.list')->with('toast_error','Oops! Error Occured. Please Try Again');
        }
    }
}
