const searchInput = document.getElementById('search');
const resultList = document.getElementById('result-list');
const mapContainer = document.getElementById('map-container');
const currentMarkers = [];

const map = L.map(mapContainer).setView([27.708317,85.3205817], 12);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

document.getElementById('search-button').addEventListener('click', () => {
    resultList.style.display = 'block';
const query = searchInput.value + ", nepal";
fetch('https://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1&q=' + query)
.then(result => result.json())
.then(parsedResult => {
setResultList(parsedResult);
});
});

function setResultList(parsedResult) {
resultList.innerHTML = "";
for (const marker of currentMarkers) {
map.removeLayer(marker);
}
map.flyTo(new L.LatLng(27.708317,85.3205817), 12);
for (const result of parsedResult) {
const option = document.createElement('option');
option.classList.add('list-group-item', 'list-group-item-action');
// option.innerHTML = \"hello\";
const addressInfo = JSON.stringify({
displayName: result.display_name,
lat: result.lat,
lon: result.lon
//storing latitude and longitude

}, undefined, 2);

console.log(JSON.parse(addressInfo).displayName);

option.innerHTML = JSON.parse(addressInfo).displayName;
option.value = addressInfo;
// option.addEventListener('click', (event) => {
// for(const child of resultList.children) {
// child.classList.remove('active');
// }
// event.target.classList.add('active');
// console.log(event.target.lastChild);
// const clickedData = JSON.parse(event.target.lastChild.innerHTML);
// const position = new L.LatLng(clickedData.lat, clickedData.lon);
// map.flyTo(position, 12);
// })

/*
const searchControl = L.esri.Geocoding.geosearch({

placeholder: \"Enter an address or place e.g. kalimati\",
useMapBounds: false,
providers: [
L.esri.Geocoding.arcgisOnlineProvider({
apikey: apiKey,
nearby: {
lat: -33.8688,
lng: 151.2093
}
})
]
}).addTo(map);*/
const position = new L.LatLng(result.lat, result.lon);
currentMarkers.push(new L.marker(position).addTo(map));
resultList.appendChild(option);
}
}

function getValue(){
// console.log(resultList.value);
    value = resultList.value;
    const clickedData = JSON.parse(value);
    const position = new L.LatLng(clickedData.lat, clickedData.lon);
    map.flyTo(position, 12);
}
