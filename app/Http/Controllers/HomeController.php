<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
class HomeController extends Controller
{
    public function redirect()
    {
        $id = Auth::id();

        if($id == true)
        {
            $user = Auth::user();

            if($user->user_type == '0')
            {
                $doctor = Doctor::all();

                return view('user.dashboard',  ['doctor' => $doctor] );
            }
            else{
                return view('admin.dashboard');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else{
            $doctor = Doctor::all();

            return view('user.dashboard', ['doctor' => $doctor]);
        }
    }

    // approved Appointment

    public function approved($id)
    {
        $data = Appointment::find($id);

        $data->status = 'Approved';

        $data->save();

        return redirect()->back();
    }

    // canceled Appointment
    public function canceled($id)
    {
        $data = Appointment::findOrFail($id);

        $data->status = 'Canceled';

        $data->save();

        return redirect()->back();
    }
}
