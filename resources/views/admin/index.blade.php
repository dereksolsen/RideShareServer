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
            <div class="col-lg-12 d-flex mb-4">
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
                    var geocoder;
                    var map;
                    
                    function initMap() {
                      var points = @json($requests);
                      var markers = [];
                      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                      var labelIndex = 0;
                      
                      map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 46.9863, lng: -94.2114},
                        zoom: 12,
                        //disableDefaultUI: true,
                        mapTypeId: 'satellite',
                        //minZoom: 12,
                        //maxZoom:12,
                        //draggable: false
                      });
                      
                      geocoder = new google.maps.Geocoder();
                      
                      console.log(points.length);
                      
                      var label, color;
                      
                      for ( var i = 0; i < points.length; i++){
                        console.log("Test" + i);
                        
                        geocoder.geocode({'address': points[i]['pick_up_address']}, function(results, status) {
                          if(status == 'OK'){
    
                            
                            markers[i] = new google.maps.Marker({
                              map:map,
                              label: labels[labelIndex++ % labels.length],
                              position: results[0].geometry.location
                            })
                          }else{
                            //alert("Error:" + status);
                          }
                        });
                      }
                      
                    }
                  </script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKitjvlrCluLZWGWNyzzS92QoRUQbUyhE&callback=initMap"
                  async defer></script>
                </div>
              </div>
            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection