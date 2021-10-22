<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{ route('appointment.store') }}" method="POST">
          @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name">
            @error('name')
                {{-- <span class="alert alert-danger">{{ $message }}</span> --}}
                <span class="wrong_message">{{ $message }}</span>
            @enderror
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address..">
            @error('email')
                {{-- <span class="alert alert-danger">{{ $message }}</span> --}}
                <span class="wrong_message">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
            @error('date')
                {{-- <span class="alert alert-danger">{{ $message }}</span> --}}
                <span class="wrong_message">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select">
                <option value="">--select doctor--</option>
                @foreach ($doctor as $doctors)
                    <option value="{{ $doctors->doctor_name }}">{{$doctors->doctor_name}}--speciality-- {{ $doctors->speciality }}</option>
                @endforeach
            </select>
            @error('doctor')
                {{-- <span class="alert alert-danger">{{ $message }}</span> --}}
                <span class="wrong_message">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone" class="form-control" placeholder="Number..">
            @error('phone')
                {{-- <span class="alert alert-danger">{{ $message }}</span> --}}
                <span class="wrong_message">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
            @error('message')
                {{-- <span class="alert alert-danger">{{ $message }}</span> --}}
                <span class="wrong_message">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <input type="submit" class="btn btn-primary mt-3 wow zoomIn" value="submit">
        {{-- <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button> --}}
      </form>
    </div>
  </div>


