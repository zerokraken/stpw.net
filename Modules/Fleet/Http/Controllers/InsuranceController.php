<?php

namespace Modules\Fleet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Fleet\Entities\Insurances;
use Modules\Fleet\Entities\Recurring;
use Modules\Fleet\Entities\Vehicle;
use Modules\Fleet\Events\CreateInsurance;
use Modules\Fleet\Events\DestroyInsurance;
use Modules\Fleet\Events\UpdateInsurance;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (\Auth::user()->can('insurance manage')) {

            $query = Insurances::where('created_by', '=', creatorId())->where('workspace', getActiveWorkSpace());

            if (!empty($request->insurance_provider)) {
                $query->where('insurance_provider', 'like', '%' . $request->insurance_provider . '%');
            }
            if (!empty($request->vehicle_name)) {
                $query->where('vehicle_name', '=', $request->vehicle_name);
            }
            if (!empty($request->policy_number)) {
                $query->where('policy_number', 'like', '%' . $request->policy_number . '%');
            }

            $insurances = $query->get();

            $vehicle = Vehicle::where('created_by', '=', creatorId())->where('workspace', getActiveWorkSpace())->get()->pluck('name', 'id');

            return view('fleet::insurance.index', compact('insurances', 'vehicle'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        if (\Auth::user()->can('insurance create')) {

            $vehicle = Vehicle::where('created_by', '=', creatorId())->where('workspace', getActiveWorkSpace())->get()->pluck('name', 'id')->prepend('Select Vehicle', '');
            $recurring = Recurring::where('created_by', '=', creatorId())->where('workspace', getActiveWorkSpace())->get()->pluck('name', 'id')->prepend('Select Recurring', '');
            return view('fleet::insurance.create', compact('vehicle', 'recurring'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if (\Auth::user()->can('insurance create')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'insurance_provider' => 'required',
                    'vehicle_name' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'scheduled_date' => 'required',
                    'scheduled_period' => 'required',
                    'deductible' => 'required',
                    'charge_payable' => 'required',
                    'policy_number' => 'required|max:10',
                    'policy_document' => 'required|image|max:20480',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->withInput()->with('error', $messages->first());
            }

            $insurance                            = new Insurances;
            $insurance->insurance_provider        = $request->insurance_provider;
            $insurance->vehicle_name              = $request->vehicle_name;
            $insurance->start_date                = $request->start_date;
            $insurance->end_date                  = $request->end_date;
            $insurance->scheduled_date            = $request->scheduled_date;
            $insurance->scheduled_period    = $request->scheduled_period;
            $insurance->deductible          = $request->deductible;
            $insurance->charge_payable      = $request->charge_payable;
            $insurance->policy_number       = $request->policy_number;

            if (!empty($request->policy_document)) {

                $filenameWithExt = $request->file('policy_document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('policy_document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $uplaod = upload_file($request, 'policy_document', $fileNameToStore, 'Insurance');

                if ($uplaod['flag'] == 1) {
                    $url = $uplaod['url'];
                } else {
                    return redirect()->back()->with('error', $uplaod['msg']);
                }
            }
            $insurance->notes         = $request->notes;
            $insurance->policy_document = !empty($request->policy_document) ? $url : '';
            $insurance->workspace = getActiveWorkSpace();
            $insurance->created_by          = creatorId();
            $insurance->save();

            event(new CreateInsurance($request,$insurance));

            return redirect()->route('insurance.index')->with('success', __('Insurances  successfully created.') . ((isset($result) && $result != 1) ? '<br> <span class="text-danger">' . $result . '</span>' : ''));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return redirect()->back();
        return view('fleet::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Insurances $insurance)
    {
        if (\Auth::user()->can('insurance edit')) {
            $vehicle = Vehicle::where('created_by', '=', creatorId())->where('workspace', getActiveWorkSpace())->get()->pluck('name', 'id')->prepend('Select Vehicle', '');
            $recurring = Recurring::where('created_by', '=', creatorId())->where('workspace', getActiveWorkSpace())->get()->pluck('name', 'id')->prepend('Select Recurring', '');

            return view('fleet::insurance.edit', compact('insurance', 'vehicle', 'recurring'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Insurances $insurance)
    {
        if (\Auth::user()->can('insurance edit')) {

            $validator = \Validator::make(
                $request->all(), [
                                    'insurance_provider' => 'required',
                                    'vehicle_name' => 'required',
                                    'start_date' => 'required',
                                    'end_date' => 'required',
                                    'scheduled_date' => 'required',
                                    'scheduled_period' => 'required',
                                    'deductible' => 'required',
                                    'charge_payable' => 'required',
                                    'policy_number' => 'required|min:8|max:10',
                                ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            if(!empty($request->policy_document))
            {
                $filenameWithExt = $request->file('policy_document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('policy_document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                $uplaod = upload_file($request,'policy_document',$fileNameToStore,'Insurance');
                if($uplaod['flag'] == 1)
                {
                    $url = $uplaod['url'];
                }
                else
                {
                    return redirect()->back()->with('error',$uplaod['msg']);
                }
            }

            $insurance->insurance_provider        = $request->insurance_provider;
            $insurance->vehicle_name        = $request->vehicle_name;
            $insurance->start_date          = $request->start_date;
            $insurance->end_date            = $request->end_date;
            $insurance->scheduled_date      = $request->scheduled_date;
            $insurance->scheduled_period    = $request->scheduled_period;
            $insurance->deductible          = $request->deductible;
            $insurance->charge_payable      = $request->charge_payable;
            $insurance->policy_number       = $request->policy_number;
            $insurance->notes         = $request->notes;
            $insurance->policy_document = !empty($request->policy_document) ? $url : '';
            $insurance->workspace = getActiveWorkSpace();
            $insurance->created_by          = creatorId();
            $insurance->save();

            event(new UpdateInsurance($request,$insurance));

            return redirect()->back()->with('success', __('Insurance Successfully updated.'));

        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Insurances $insurance)
    {
        if(\Auth::user()->can('insurance delete'))
        {
            if(!empty($insurance->policy_document))
            {
                delete_file($insurance->policy_document);
            }
            $insurance->delete();
            event(new DestroyInsurance($insurance));

            return redirect()->route('insurance.index')->with('success', 'Insurance successfully deleted.' );
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
