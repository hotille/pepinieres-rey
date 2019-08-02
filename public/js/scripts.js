$(".btn-success").click(function () {
    $('.media-body').css({ opacity: 0 });
    $(this).parent().find('.media-body').css({ opacity: 0.7 });
});


jQuery(document).ready(function () {
    
    // Une variable carte qui va contient un objet map de la bibliothèque Leaflet.
    // J'ai centré la carte sur Lyon avec un zoom de 6
    var carte = L.map('macarte').setView([45.75, 4.85], 6);

    // La première partie désigne le fournisseur de cartes et place des marqueurs de templates dans son adresse. 
    // Ensuite, j'ajoute ce fournisseur de carte à notre variable carte créée juste avant.
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(carte);

// Pour placer un marqueur, je crée une variable de type marker en lui donnant des coordonnées.
    var marker = L.marker([45.8883, 4.721070000000054]).addTo(carte);

// Pour attacher une popup au matqueur, j'utilise la fonction bindPopup
// Je récupère cette popup pour la manipuler via la méthode getPopup
    marker.bindPopup('');
    var mapopup = marker.getPopup();

// J'appele la fonction openPopup
    mapopup.setContent('Pépinières Rey');
    marker.openPopup();











});

    


