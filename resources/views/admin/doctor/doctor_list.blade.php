@extends('layout.admin_master')

@section('main_panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Doctor List </h3>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('doctors.index') }}">Doctors</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('doctors.create') }}">Add Doctors</a></li>
                  </ol>
                </nav>
            </div>

            @if (session()->has('alert-success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session('alert-success') }}
                </div>
            @endif

            @if (session()->has('alert-danger'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session('alert-danger') }}
                </div>
            @endif

            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>SL NO</th>
                                  <th>DOCTOR NAME</th>
                                  <th>PHONE</th>
                                  <th>SPECIALITY</th>
                                  <th>ROOM</th>
                                  <th>IMAGE</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($all_doctor as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doctor->doctor_name }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->speciality }}</td>
                                        <td>{{ $doctor->room_no }}</td>
                                        <td><img src="{{asset('doctorimage/'.$doctor->image)}}" alt=""></td>
                                        <td class="d-flex">
                                            <form action="{{ route('doctors.destroy', ['doctor'=> $doctor->id ]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are You Sure!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>

                                            <a style="margin-left: 8px" href="{{ route('doctors.edit' , ['doctor'=> $doctor->id ]) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
