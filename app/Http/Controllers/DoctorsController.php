<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Appointments;
use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DoctorsController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::all();
        return view('index', compact('doctors'));
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        $count = $doctor->appointments->count();
        $appointments = Appointments::where('doctor_id', $id)->orderBy('time_from')->take($count)->get();
        $curr_date = Carbon::now('Europe/Skopje');
        $curr_date_week = Carbon::now('Europe/Skopje')->addWeek();
        $curr_appointments = array();
        foreach ($appointments as $appointment) {
            if ($curr_date < $appointment->time_from && $appointment->time_from < $curr_date_week) {
                $curr_appointments[] = $appointment;
            }
        }
        return view('doctor', compact('doctor'), compact('curr_appointments'));
    }

    public function create()
    {
        return view('create-doctor');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'speciality' => 'required||min:5',
            'institution' => 'required|min:5',
        ]);
        $doctor = new Doctor;
        $doctor->name = $request->get('name');
        $doctor->speciality = $request->get('speciality');
        $doctor->institution = $request->get('institution');
        $doctor->is_active = $request->get('is_active');
        $doctor->save();
        return redirect()->route('doctors.index');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->route('doctors.index');
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('edit-doctor', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'speciality' => 'required||min:5',
            'institution' => 'required|min:5',
        ]);
        $doctor = Doctor::find($id);
        $doctor->name = $request->get('name');
        $doctor->speciality = $request->get('speciality');
        $doctor->institution = $request->get('institution');
        $doctor->is_active = $request->get('is_active');
        $doctor->save();
        return redirect()->route('doctors.index');
    }
}
