<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            gm-map {
                display: block;
                width: 100%;
                height: 300px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
            @endif
            
            <div class="container">
                <div class="content">
                    <h4 class="mb-5 font-weight-bold">
                        PERANCANGAN DAN PEMBANGUNAN SISTEM INFORMASI GEOGRAFIS PEMETAAN LOKASI PENYEDIAAN JASA SERVIS PERANGKAT KOMPUTER DI WILAYAH KABUPATEN TANGERANG BERBASI WEB
                    </h4>  
                    <div id="map" style="height: 600px;" class="w-100 mt-5"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoHZpg4l8-P_mVOppKvVwBpjaUicWtM6k"></script>
        <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript">
            function openModal(url) {
                var modalImg = $('#img-exampleModal');
                modalImg.attr('src', url);
                $('#exampleModal').modal('toggle')
            }
            var locations = JSON.parse('<?= $locations; ?>');
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 10,
              center: new google.maps.LatLng(locations[0][1], locations[0][2]),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            
            var infowindow = new google.maps.InfoWindow();
        
            var marker, i;
            
            for (i = 0; i < locations.length; i++) {  
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
              });
              const contentString =
            '<div class="mx-5"><h4 id="firstHeading" class="firstHeading">'+ locations[i][0] +'</h4>' +
            '<img src='+ locations[i][6] +' class="mb-2" style="max-height:100px;" />'+
            '<div id="bodyContent">' +
            locations[i][4]
             +
            locations[i][5]
            +
            "</div></div>";
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  infowindow.setContent(contentString);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            }
          </script>
    </body>
</html>
