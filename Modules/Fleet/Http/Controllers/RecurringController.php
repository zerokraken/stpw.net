<?php

namespace Modules\Fleet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Fleet\Entities\Insurances;
use Modules\Fleet\Entities\Recurring;
use Modules\Fleet\Events\CreateRecurring;
use Modules\Fleet\Events\DestroyRecurring;
use Modules\Fleet\Events\UpdateRecurring;

class RecurringController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (\Auth::user()->can('recuerring manage')) {
            $Recurrings = Recurring::where('created_by', creatorId())->where('workspace', getActiveWorkSpace())->get();

            return view('fleet::recurring.index', compact('Recurrings'));
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        if (\Auth::user()->can('recuerring create')) {
            return view('fleet::recurring.create');
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if(\Auth::user()->can('recuerring create'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('recuerring.index')->with('error', $messages->first());
            }

            $Recurring             = new Recurring();
            $Recurring->name       = $request->name;
            $Recurring->workspace  = getActiveWorkSpace();
            $Recurring->created_by = creatorId();
            $Recurring->save();
            event(new CreateRecurring($request,$Recurring));

            return redirect()->route('recuerring.index')->with('success', __('Recurring successfully created!'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return redirect()->back()->with('error', __('Permission denied.'));
        return view('fleet::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        if (\Auth::user()->can('recuerring edit')) {
            $recurring = Recurring::find($id);
            return view('fleet::recurring.edit',compact('recurring'));
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Recurring $recurring)
    {
        if(\Auth::user()->can('recuerring edit'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $recurring->name       = $request->name;
            $recurring->workspace  = getActiveWorkSpace();
            $recurring->created_by = creatorId();
            $recurring->save();
            event(new UpdateRecurring($request,$recurring));

            return redirect()->route('recuerring.index')->with('success', __('Recurring successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Recurring $recurring)
    {
        if(\Auth::user()->can('recuerring delete'))
        {
            $recurrings = Insurances::where('scheduled_period', $recurring->id)->first();
            if(!empty($recurrings))
            {
                return redirect()->back()->with('error', __('this recurring is already use so please transfer or delete this recurring related data.'));
            }
            $recurring->delete();
            event(new DestroyRecurring($recurring));

            return redirect()->route('recurring.index')->with('success', 'Recurring successfully deleted.' );
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
