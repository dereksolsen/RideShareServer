@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Drivers</h1>
          </div>

          <div class="d-flex row flex-grow-1">
            <!-- Area Chart -->
            <div class="col-lg-9 d-flex mb-4">
              <div class="card shadow d-flex flex-grow-1">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Map</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column" style="padding:0;">
                  <div class="chart-area d-flex flex-grow-1" id="map" style="min-height:75vh;">
                  </div>
                  <script>
                    var map;
                    function initMap() {
                      map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 46.41611111, lng: -94.27500000},
                        zoom: 15.5,
                        disableDefaultUI: true,
                        mapTypeId: 'satellite',
                        minZoom: 15
                      });
                    }
                  </script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1V1IXtf9k-gcheHfdkkPw3jnglMitPq8&callback=initMap"
                  async defer></script>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="d-flex w-100 flex-column">
                      <div style="font-size:5em;" class="text-center">NUMBER</div>
                      <div class="dropdown-divider"></div>
                      <div style="font-size:2em;" class="text-center">NAME</div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </div>

          <!-- Content Row -->

          <div class="d-flex flex-grow-1 row">
  
              <!-- DataTales Example -->
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Runs</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Vehicle</th>
                          <th>School</th>
                          <th>Distance</th>
                          <th>AvgSpeed</th>
                          <th>Time</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Vehicle</th>
                          <th>School</th>
                          <th>Distance</th>
                          <th>AvgSpeed</th>
                          <th>Time</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      
                        <tr>
                          <td>NUMBER</td>
                          <td>NAME</td>
                          <td>DISTANCE</td>
                          <td>AVERAGE SPEED</td>
                          <td>0</td>
                        </tr>
                        
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