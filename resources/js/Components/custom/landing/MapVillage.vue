<template>
    <div id="map" class="w-full" style="height: 900px;"></div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import L from 'leaflet';

onMounted(async () => {
    const map = L.map('map', { scrollWheelZoom: false }).setView([-7.46706, 108.256], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    fetch('/geojson/kaputihan.geojson')
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data, {
                style: function (feature) {
                    if (feature.properties.NAMOBJ === "Kaputihan") {
                        return { color: "red", fillColor: "green" };
                    } else if (feature.properties.REMARK?.includes("Jalan")) {
                        return { color: "#FFD700", weight: 2 };
                    } else {
                        return { color: "#F4A582", fillColor: "#F4A582" };
                    }
                },
                onEachFeature: function (feature, layer) {
                    layer.bindPopup(feature.properties.OBJECT);
                }
            }).addTo(map);
        });
    const redIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png', 
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41], 
        iconAnchor: [12, 41], 
        popupAnchor: [1, -34] 
    });

    L.marker([-7.4652199, 108.2420134], { icon: redIcon }) 
        .addTo(map)
        .bindPopup(`
      <b>Kantor Kepala Desa Kaputihan</b><br><br>
      <div class="d-flex justify-content-center">
      <a href="https://maps.app.goo.gl/UK8vaKNgGqmus36D9" target="_blank">
      <button class="btn btn-sm btn-primary">
        Buka di Google Maps
      </button>
      </a>
      </div>
    `)
        .openPopup();


    L.marker([-7.4650298, 108.2404524])
        .addTo(map)
        .bindPopup(`
      <b>Dusun Cikopo</b><br><br>
      <div class="d-flex justify-content-center">
      <a href="https://maps.app.goo.gl/vp1w6F1nYEbp137XA" target="_blank">
      <button class="btn btn-sm btn-primary">
        Buka di Google Maps
      </button>
      </a>
      </div>
    `);

    L.marker([-7.470536, 108.2433031])
        .addTo(map)
        .bindPopup(`
      <b>Dusun Unara</b><br><br>
      <div class="d-flex justify-content-center">
      <a href="https://maps.app.goo.gl/8wMcYn4G4y954MxYA" target="_blank">
      <button class="btn btn-sm btn-primary">
        Buka di Google Maps
      </button>
      </a>
      </div>
    `);

    L.marker([-7.4696984, 108.2619905])
        .addTo(map)
        .bindPopup(`
      <b>Dusun Cidua</b><br><br>
      <div class="d-flex justify-content-center">
      <a href="https://maps.app.goo.gl/QGHtrcLDdeoVho2j7" target="_blank">
      <button class="btn btn-sm btn-primary">
        Buka di Google Maps
      </button>
      </a>
      </div>
    `);

    L.marker([-7.4662112, 108.2457676])
        .addTo(map)
        .bindPopup(`
      <b>Dusun Sirnasari</b><br><br>
      <div class="d-flex justify-content-center">
      <a href="https://maps.app.goo.gl/tkEjUQos9qQum57r5" target="_blank">
      <button class="btn btn-sm btn-primary">
        Buka di Google Maps
      </button>
      </a>
      </div>
    `);
});
</script>

<style>
@import 'leaflet/dist/leaflet.css';
</style>