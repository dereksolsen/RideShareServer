@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
          </div>

          <!-- Content Row -->

          <div class="d-flex flex-grow-1 row flex-column">

            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Register New Client</h6>
            </div>
            <div class="card-body">
              <form action="{{ url('/clients') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail">
                </div>
                <div class="form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="tel" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="confirm_password">Password (confirm)</label>
                  <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password (confirm)">
                </div>
                <button type="submit" class="btn btn-primary">Register Client</button>
              </form>
            </div>
          </div>
            
            
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection