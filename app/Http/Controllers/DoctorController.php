<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $all_doctor = Doctor::paginate();

                return view('admin.doctor.doctor_list', ['all_doctor' => $all_doctor]);
            }

            else{
                return redirect()->back();
            }


        }
        else{
            return redirect('login');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.add_doctor');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $doctor = new Doctor;

        $image = $request->image;

        $imageName = time().'.'.$image->getClientoriginalExtension();

        $request->image->move('doctorimage', $imageName);

        $doctor->image = $imageName;

        $doctor->doctor_name = $request->doctor_name;

        $doctor->phone = $request->phone;

        $doctor->speciality = $request->speciality;

        $doctor->room_no = $request->room_no;

        //$doctor->fill($request->all())->save();
        $doctor->save();

        $value = "Added New Doctor Successfully";

        $request->session()->flash('alert-success', $value);

        return redirect()->route('doctors.index');
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
        $single_doctor = Doctor::findOrFail($id);

        return view('admin.doctor.doctor_edit',['single_doctor'=> $single_doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, $id)
    {
        $single_doctor = Doctor::findOrFail($id);

        $single_doctor->doctor_name = $request->doctor_name;
        $single_doctor->phone = $request->phone;
        $single_doctor->speciality = $request->speciality;
        $single_doctor->room_no = $request->room_no;

       if($request->hasFile('image'))
       {
            $destination = 'doctorimage/'.$single_doctor->image;

            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = time().'.'.$extension;
            $file->move('doctorimage/',$fileName);

            $single_doctor->image = $fileName;
       }

        $single_doctor->update();

        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Doctor::findOrFail($id);

        $data->delete();

        $value = "Doctor Deleted Successfully";

        Session::flash('alert-danger',$value);
        return redirect()->back();
    }
}
