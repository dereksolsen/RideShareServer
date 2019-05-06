@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
          </div>

          <div class="d-flex row flex-grow-1">
            <!-- Area Chart -->
            <div class="col-lg-12 d-flex mb-4">
              <div class="card shadow d-flex flex-grow-1">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column">
                   <form action="{{ url('/clients/' . $client['email']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name='action' value="edit">
                    <div class="form-group">
                      <label for="name">First Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $client['name'] }}">
                    </div>
                    <div class="form-group">
                      <label for="email">E-Mail</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail" value="{{ $client['email'] }}">
                    </div>
                    <div class="form-group">
                      <label for="phone_number">Phone Number</label>
                      <input type="tel" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number" value="{{ $client['phone_number'] }}">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="confirm_password">Password (confirm)</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password (confirm)">
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        
        </div>
        <!-- /.container-fluid -->
@endsection