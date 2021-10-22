@extends('layout.admin_master')

@section('main_panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Add Doctors </h3>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Doctors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Doctors</li>
                  </ol>
                </nav>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                          <form class="forms-sample" action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputDoctorName">Doctor Name</label>
                                <input type="text" name="doctor_name" class="form-control" id="exampleInputDoctorName" placeholder="write the doctor name">
                                @error('doctor_name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="write the Number">
                                @error('phone')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPhone">Speciality</label>
                                <select name="speciality" class="form-control" name="" id="">
                                    <option value="" selected disabled>Speciality</option>
                                    <option value="skin">Skin</option>
                                    <option value="heart">Heart</option>
                                    <option value="eye">Eye</option>
                                    <option value="nose">Nose</option>
                                </select>
                                @error('speciality')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputRoom">Room No</label>
                                <input type="text" name="room_no" class="form-control" id="exampleInputRoom" placeholder="write the room no">
                                @error('room_no')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputImage">Doctor Image</label>
                                <input type="file" name="image" class="form-control" id="exampleInputImage">

                                @error('image')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="submit">

                            </div>


                          </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
