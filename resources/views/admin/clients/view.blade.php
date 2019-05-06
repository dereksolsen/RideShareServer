@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
            <a href="{{ url('/clients/' . $client['email'] . '/edit') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Edit</a>
          </div>
          
          <div class="d-flex row flex-grow-1">
            <!-- Area Chart -->
            <div class="col-lg-12 d-flex mb-4">
              <div class="card shadow d-flex flex-grow-1">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h2 class="m-0 font-weight-bold text-primary">{{ $client['name'] }}</h2>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column">
                  <h5>Email: <a href="mailto:{{$client['email']}}">{{ $client['email'] }}</a></h5>
                  <h5>Phone: <a href="tel:{{$client['phone_number']}}">{{ $client['phone_number'] }}</a></h5>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex row">
            <!-- Area Chart -->
            <div class="col-lg-12 d-flex mb-4">
              <div class="card shadow d-flex flex-grow-1">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Historical Requests</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column">
                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
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
                      <th>Driver</th>
                      <th>Pick-Up</th>
                      <th>Destination</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Length</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($history as $request)
                    <tr>
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
          
                    <div class="d-flex row">
            <!-- Area Chart -->
            <div class="col-lg-12 d-flex mb-4">
              <div class="card shadow d-flex flex-grow-1">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Reviews</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column">
                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Driver</th>
                      <th>Rating</th>
                      <th>Comment</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Date</th>
                      <th>Driver</th>
                      <th>Rating</th>
                      <th>Comment</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($client->ratings as $review)
                    <tr>
                      <td>{{ $review->history['date'] }}</td>
                      <td>{{ $review->history->driver['name'] }}</td>
                      <td>@for ($i = 0; $i < 5; $i++)
                        @if ($i < $review['driver_rating'])
                          <i class="fa fa-star"></i>
                        @else
                          <i class="far fa-star"></i>
                        @endif
                      @endfor</td>
                      <td>{{ $review['driver_comment'] }}</td>
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
        <!-- /.container-fluid -->
@endsection