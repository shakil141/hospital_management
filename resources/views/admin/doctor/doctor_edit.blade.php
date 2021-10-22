@extends('layout.admin_master')

@section('main_panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Edit Doctor </h3>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Doctors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Doctor</li>
                  </ol>
                </nav>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                          <form class="forms-sample" action="{{ route('doctors.update', ['doctor'=> $single_doctor->id ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputDoctorName">Doctor Name</label>
                                <input type="text" name="doctor_name" value="{{ old('doctor_name') ?? $single_doctor->doctor_name }}" class="form-control" id="exampleInputDoctorName" placeholder="write the doctor name">
                                @error('doctor_name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') ?? $single_doctor->phone }}" class="form-control" id="exampleInputPhone" placeholder="write the Number">
                                @error('phone')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPhone">Speciality</label>
                                <select name="speciality" class="form-control" name="" id="">

                                    <option value="skin" {{ $single_doctor->speciality =='skin' ? 'selected': '' }}>Skin</option>
                                    <option value="heart"  {{ $single_doctor->speciality =='heart' ? 'selected': '' }}>Heart</option>
                                    <option value="eye" {{ $single_doctor->speciality =='eye' ? 'selected': '' }}>Eye</option>
                                    <option value="nose" {{ $single_doctor->speciality =='nose' ? 'selected': '' }}>Nose</option>
                                </select>
                                @error('speciality')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputRoom">Room No</label>
                                <input type="text" name="room_no" value="{{ $single_doctor->room_no }}" class="form-control" id="exampleInputRoom" placeholder="write the room no">
                                @error('room_no')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputImage">Doctor Old Image</label>
                                <img height="150px" width="150px" src="{{ asset('doctorimage/'.$single_doctor->image) }}" alt="doctor_img">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputImage">Doctor New Image</label>
                                <input type="file" name="image" class="form-control">
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
