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
              <h6 class="m-0 font-weight-bold text-primary">Create New Request</h6>
            </div>
            <div class="card-body">
              <form action="{{ url('/requests') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" class="form-control" id="client_id">
                        <option disabled selected>Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="pick_up_address">Pick Up Address</label>
                  <input type="text" name="pick_up_address" class="form-control" id="pick_up_address" placeholder="Pick Up Address">
                </div>
                <div class="form-group">
                  <label for="destination_address">Destination Address</label>
                  <input type="text" name="destination_address" class="form-control" id="destination_address" placeholder="Destination Address">
                </div>
                <div class="form-group">
                  <label for="estimated_length">Estimated Duration</label>
                  <input type="text" name="estimated_length" class="form-control" id="estimated_length" placeholder="Estimated Duration">
                </div>
                <div class="form-group">
                  <label for="time">Time</label>
                  <input type="text" name="time" class="form-control" id="time" placeholder="Time (20:36)">
                </div>
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="text" name="date" class="form-control" id="date" placeholder="Date (11-07-2019)">
                </div>
                <button type="submit" class="btn btn-primary">Create Request</button>
              </form>
            </div>
          </div>
            
            
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection