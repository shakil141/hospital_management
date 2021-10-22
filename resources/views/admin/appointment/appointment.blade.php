@extends('layout.admin_master')

@section('main_panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" style="background: #3498db">SL No</th>
                                    <th scope="col" style="background: #3498db">Name</th>
                                    <th scope="col" style="background: #3498db">Email</th>
                                    <th scope="col" style="background: #3498db">Date</th>
                                    <th scope="col" style="background: #3498db">Doctor Name</th>
                                    <th scope="col" style="background: #3498db">Phone</th>
                                    <th scope="col" style="background: #3498db">Message</th>
                                    <th scope="col" style="background: #3498db">Status</th>
                                    <th scope="col" style="background: #3498db">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($appointments as $appointment)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{  $appointment->name }}</td>
                                    <td>{{  $appointment->email }}</td>
                                    <td>{{  $appointment->date }}</td>
                                    <td>{{  $appointment->doctor }}</td>
                                    <td>{{  $appointment->phone }}</td>
                                    <td>{{  $appointment->message }}</td>
                                    <td>{{  $appointment->status }}</td>
                                    <td>
                                        <a href="{{ url('approved',$appointment->id) }}" class="btn btn-success btn-sm">Approved</a>
                                        <a href="{{ url('canceled',$appointment->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center p-3">
                            {{ $appointments->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
