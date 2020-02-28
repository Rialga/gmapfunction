var map;
var titik;
var markers = [];


function initMap(){
	var padang ={lat: -0.9151259, lng: 100.4604039};
	var noPoi = [
		{
			featureType: 'poi',
			stylers: [ { visibility: 'off' } ]   
		}
	];
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: padang,
		fullscreenControl: false
	});
	// var bounds = new google.maps.LatLngBounds();
	// map.fitBounds(bounds);
	map.setOptions({ styles: noPoi });
	addFTI();
	addRMUniang();
	addCafeBiro();
	addGedungBC();
	addPondokanFadilla();
	addAmperaPakDed();
	addCafeUncuFMIPA();
	addAmperaJembatanRizky();
}

function addFTI(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9153639, lng : 100.4606524},
		label : 'FTI',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

function addCafeBiro(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9107801, lng : 100.4602151},
		label : 'Cafe Biro',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

function addAmperaJembatanRizky(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9127721, lng : 100.4615474},
		label : 'Ampera Jembatan Rizky',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

function addRMUniang(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9132053, lng : 100.4578707},
		label : 'RM Uniang Abak',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

function addCafeUncuFMIPA(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9141822, lng : 100.4601091},
		label : 'Cafe Uncu FMIPA',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

function addGedungBC(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9170577, lng : 100.4534880},
		label : 'Business Center',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

function addPondokanFadilla(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9195219, lng : 100.4532128},
		label : 'Pondokan Fadilla',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

function addAmperaPakDed(){
	var marker = new google.maps.Marker({
		position : {lat : -0.9200535, lng : 100.4546208},
		label : 'Ampera Pak Ded',
		map : map
	});
	// marker.setMap(map);
	markers.push(marker);
}

