@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
            <a href="{{ url('/clients/register') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> New Client</a>
          </div>

          <!-- Content Row -->

          <div class="d-flex flex-grow-1 row flex-column">

            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Phone Number</th>
                      <th>Rating</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Phone Number</th>
                      <th>Rating</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($clients as $client)
                    <tr>
                      <td><a href="{{ url('/clients/' . $client['email']) }}">{{ $client['name'] }}</a></td>
                      <td><a href="mailto:{{ $client['email'] }}">{{ $client['email'] }}</a></td>
                      <td>{{ $client['phone_number'] }}</td>
                      <td>@for ($i = 0; $i < 5; $i++)
                        @if ($i < $client->rating())
                          <i class="fa fa-star"></i>
                        @else
                          <i class="far fa-star"></i>
                        @endif
                      @endfor</td>
                      <td>
                        @if ($client['authenticated'] == 0)
                        <form method="post" action="{{ url('/clients/' . $client['email']) }}">
                          @CSRF
                          @method('PATCH')
                          <input type="hidden" name='action' value="authorize">
                          <input type="submit" class="btn btn-warning" value="Authorize">
                        </form>
                        @else
                        <div style="float:left;">
                          <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a>&nbsp;
                        </div>
                        <form method="get" action="{{ url('/clients/' . $client['email'] . '/edit') }}" style="float:left;">
                          <input type="submit" class="btn btn-info" value="Edit">
                        </form>
                        @endif
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
@section('action',url('/clients/' . $client['email']))
@section('desc'," request")