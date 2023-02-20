<?php
include '..\main_page_partials\config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM donations WHERE id=$id";
$sql_query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($sql_query);
$lat = $row['lat'];
$lon = $row['lng'];
?>
 <html><head>
 <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/vector-map/jqvmap.css">
    <link rel="stylesheet" href="../assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" /> </head>
<div id="map-container" style="height:100vh;width:100vw;">
</div>

<script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous">
</script>
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script>
const mapContainer = document.getElementById('map-container');
const map = L.map(mapContainer).setView([27.708317,85.3205817], 12);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

const lat=<?php echo ($lat);?>;
const lon=<?php echo ($lon);?>;
 console.log(lat);
 console.log(lon);
const position=(new L.LatLng(lat,lon));
const marker=new L.marker(position).addTo(map);
map.flyTo(position, 12);
</script>
<script type="text/javascript">
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position) {
        document.querySelector('.myForm input[name="lat")'.value = position.coords.latitude);
        document.querySelector('.myForm input[name="lng")'.value = position.coords.latitude);
    }
    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                location.reload();
                break;
        }
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2qa7fez3bItj4wIPEUoo07Tx_gX2jctw&callback=loadMap">
</script>
</html> 