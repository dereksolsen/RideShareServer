@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Requests</h1>
            <div>
              <a href="{{ url('/requests/new') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Schedule Pickup</a>
              <a href="{{ url('/requests/history') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-history fa-sm text-white-50"></i> History</a>
            </div>
          </div>

          <!-- Content Row -->

          <div class="d-flex flex-grow-1 row flex-column">

            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
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
                      <th>Actions</th>
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
                      <th>Actions</th>
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
                      
                      <td>
                        
                        <form method="get" action="{{ url('/requests/' . $request['id'] . '/edit') }}">
                          <div style="float:left;">
                          <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a>&nbsp;
                          </div>
                          <input type="submit" class="btn btn-info" value="Edit">
                        </form>
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
        <!-- /.container-fluid -->
@endsection

@section('action',url('/requests/' . $request['id']))
@section('desc'," request")