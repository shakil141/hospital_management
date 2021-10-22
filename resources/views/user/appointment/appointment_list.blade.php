
@include('user.user_partials.header')

@include('user.user_partials.css')
@include('user.user_partials.js')

<section id="appoinment_list">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="background: #3498db">SL No</th>
                            <th scope="col" style="background: #3498db">Doctor Name</th>
                            <th scope="col" style="background: #3498db">Date</th>
                            <th scope="col" style="background: #3498db">Message</th>
                            <th scope="col" style="background: #3498db">Status</th>
                            <th scope="col" style="background: #3498db">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr  class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->message }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>
                                   <form method="POST" action="{{ route('appointment.destroy', ['appointment' => $appointment->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('are you sure! Please confirm this Delete')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $appointments->links() }}
                </div>
            </div>

        </div>
    </div>
</section>

@include('user.user_partials.footer')
