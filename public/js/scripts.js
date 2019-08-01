
// window.addEventListener('load', function (){
// 	if (window.jQuery) {
// 		alert('Le script est chargé');
// 	} else {
// 		alert('Problème avec le script');
// 	}
// });

jQuery(document).ready(function () {

    // Lyon 
    var carte = L.map('macarte').setView([45.75, 4.85], 6);

    //  Un fond de carte 
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(carte);

    // Marker sur Pépinières Rey et pop up
    var marker = L.marker([45.8883, 4.721070000000054]).addTo(carte);
    marker.bindPopup('');
    var mapopup = marker.getPopup();

    mapopup.setContent('Pépinières Rey');
    marker.openPopup();











});

    


