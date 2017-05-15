<?php

namespace App\Http\Controllers;

use App\Appointments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    //
    public function show($id)
    {
        $appointment = Appointments::find($id);

        return view('show-appointment', compact('appointment'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('create-appointment', compact('doctors'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date|after:today',
            'time_from' => 'required',
            'time_to' => 'required|after:time_from',
            'patient_name' => 'required|min:5'
        ]);
        $appointment = new Appointments;
        $appointment->patient_name = $request->get('patient_name');
        $appointment->doctor_id = $request->get('doctor_id');
        $datum = $request->get('date');
        //$date = Carbon::create($datum);
        $datum_arr = (explode('-', $datum));
        $time_from = $request->get('time_from');
        $time_from_arr = explode(':', $time_from);
        $date_from = Carbon::create($datum_arr[0], $datum_arr[1], $datum_arr[2], $time_from_arr[0], $time_from_arr[1]);
        $appointment->time_from = $date_from;
        $time_to = $request->get('time_to');
        $time_to_arr = explode(':', $time_to);
        $date_to = Carbon::create($datum_arr[0], $datum_arr[1], $datum_arr[2], $time_to_arr[0], $time_to_arr[1]);
        $appointment->time_to = $date_to;
        $appointment->has_occured = $request->get('has_occured');
        $appointment->save();
        return redirect()->route('doctors.index');
    }

    public function destroy($id)
    {
        $appointment = Appointments::find($id);
        $appointment->delete();
        return redirect()->route('doctors.show', $appointment->doctor_id);
    }

    public function edit($id)
    {
        $appointment = Appointments::find($id);
        $doctors = Doctor::all();
        $doctor = Doctor::find($appointment->doctor_id);
        return view('edit-appointment', compact('appointment'), compact('doctors'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required|date|after:today',
            'time_from' => 'required',
            'time_to' => 'required|after:time_from',
            'patient_name' => 'required|min:5'
        ]);
        $appointment = Appointments::find($id);
        $appointment->patient_name = $request->get('patient_name');
        $appointment->doctor_id = $request->get('doctor_id');
        $datum = $request->get('date');
        //$date = Carbon::create($datum);
        $datum_arr = (explode('-', $datum));
        $time_from = $request->get('time_from');
        $time_from_arr = explode(':', $time_from);
        $date_from = Carbon::create($datum_arr[0], $datum_arr[1], $datum_arr[2], $time_from_arr[0], $time_from_arr[1]);
        $appointment->time_from = $date_from;
        $time_to = $request->get('time_to');
        $time_to_arr = explode(':', $time_to);
        $date_to = Carbon::create($datum_arr[0], $datum_arr[1], $datum_arr[2], $time_to_arr[0], $time_to_arr[1]);
        $appointment->time_to = $date_to;
        $appointment->has_occured = $request->get('has_occured');
        $appointment->save();
        return redirect()->route('appointments.show', $id);
    }
}
