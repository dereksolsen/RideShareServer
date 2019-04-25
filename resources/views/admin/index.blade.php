@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid d-flex flex-column flex-grow-1">

          <!-- Page Heading -->
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->

          <div class="d-flex flex-grow-1 row">

            <!-- Area Chart -->
            <div class="col-lg-9 d-flex mb-4">
              <div class="card shadow d-flex flex-grow-1">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Map</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column" style="padding:0;">
                  <div class="chart-area d-flex flex-grow-1" id="map">
                  </div>
                  <script>
                    var map;
                    function initMap() {
                      map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 46.9863, lng: -94.2114},
                        zoom: 12,
                        disableDefaultUI: true,
                        mapTypeId: 'satellite',
                        minZoom: 12,
                        maxZoom:12,
                        draggable: false
                      });
                    }
                  </script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1V1IXtf9k-gcheHfdkkPw3jnglMitPq8&callback=initMap"
                  async defer></script>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
                <h3>Upcoming Rides</h3>
                @foreach ($requests as $request)
                
                @endforeach
                <div style="width:100%; height:100px;background-color:white; border-radius:5px;">
                  <div style="float:left; height:100%; border-right: 1px solid black;">9:32</div>
                  <div style="float:left; height:100%; padding:10px;">
                    <h6>Name</h6>
                  </div>
                  <div style="float:right; height:100%; padding:5px; background-color:green;">
                    Font A
                  </div>
                </div>
            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection