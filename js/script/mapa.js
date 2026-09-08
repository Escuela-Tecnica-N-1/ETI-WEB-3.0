// Inicializar el mapa
const mapa = L.map('mapa').setView([-36.02054340825117, -59.102123271464116], 17); // Coordenadas aproximadas de Buenos Aires, ajustar según tu ubicación

// Añadir capa de OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapa);

// Añadir marcador para la Escuela de Educación Técnica N°1
// Reemplaza estas coordenadas con las exactas de la escuela
const coordenadas = [-36.02054340825117, -59.102123271464116]; 

// Crear icono personalizado similar al de Google Maps
const iconoEscuela = L.icon({
iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
iconSize: [25, 41],
iconAnchor: [12, 41],
popupAnchor: [1, -34],
shadowSize: [41, 41]
});

// Añadir el marcador al mapa
const marcador = L.marker(coordenadas, {icon: iconoEscuela}).addTo(mapa);

// Añadir popup con información
marcador.bindPopup("<b>Escuela de Educación Técnica N°1</b>").openPopup();

// Añadir controles de zoom
L.control.zoom({
position: 'bottomright'
}).addTo(mapa);