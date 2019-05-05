@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Requests</h1>
          </div>

          <!-- Content Row -->

          <div class="d-flex flex-grow-1 row flex-column">

            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Request History</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Driver</th>
                      <th>Pick-Up</th>
                      <th>Destination</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Length</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Client</th>
                      <th>Driver</th>
                      <th>Pick-Up</th>
                      <th>Destination</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Length</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($requests as $request)
                    <tr>
                      <td>{{ $request->client['name'] }}</td>
                      <td>{{ $request->driver['name'] }}</td>
                      <td>{{ $request['pick_up_address'] }}</td>
                      <td>{{ $request['destination_address'] }}</td>
                      <td>{{ $request['date'] }}</td>
                      <td>{{ $request['time'] }}</td>
                      <td>{{ $request['estimated_length'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            
            
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection