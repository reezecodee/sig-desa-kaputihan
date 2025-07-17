<script setup>
import { onMounted, ref } from 'vue'
import L from 'leaflet'
import axios from 'axios'

const props = defineProps({
  height: Number
})

const style = {
  height: `${props.height}px`
}
const markersList = ref([]);

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

  const getIcon = (color) => {
    return L.icon({
      iconUrl: `https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-${color}.png`,
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34]
    })
  };

  L.marker([-7.465070961927788, 108.24454005036246], { icon: getIcon('red') })
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


  try {
    const response = await axios.get(route('admin.locationList', 'map'));

    response.data.forEach((lokasi) => {
      L.marker([lokasi.latitude, lokasi.longitude], { icon: getIcon(lokasi.warna) })
        .addTo(map)
        .bindPopup(`
          <b>${lokasi.nama_lokasi}</b><br><br>
          <div class="d-flex justify-content-center">
            <a href="${lokasi.link}" target="_blank">
              <button class="btn btn-sm btn-primary">
                Buka di Google Maps
              </button>
            </a>
          </div>
        `);
    });
  } catch (error) {
    console.error("Gagal mengambil data lokasi:", error);
  }
});
</script>

<template>
  <div id="map" class="w-full z-10 rounded" :style="style"></div>
</template>

<style>
@import 'leaflet/dist/leaflet.css';

.leaflet-control-attribution{
  display: none;
}
</style>