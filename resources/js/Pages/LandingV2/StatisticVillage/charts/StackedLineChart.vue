<script setup>
import * as echarts from 'echarts';
// 1. Perbaiki typo dan pastikan semua yang dibutuhkan di-import
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    title: String,
    data: Object,
});

// Siapkan ref untuk elemen DOM
const chartRef = ref(null);

// Variabel untuk menyimpan instance chart
let myChart = null;

// Fungsi untuk resize agar bisa dihapus saat unmount
const resizeChart = () => {
    if (myChart) {
        myChart.resize();
    }
};

onMounted(() => {
    // Inisialisasi chart pada elemen ref
    myChart = echarts.init(chartRef.value);

    // Gunakan const untuk option
    const option = {
        title: {
            text: props.title
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            top: 'bottom',
            data: props.data.label
        },
        grid: {
            bottom: '10%', 
            left: '3%',
            right: '4%',
            top: '15%', 
            containLabel: true
        },
        toolbox: {
            feature: {
                saveAsImage: {}
            }
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: props.data.tahun
        },
        yAxis: {
            type: 'value'
        },
        series: props.data.series
    };

    myChart.setOption(option);

    // Tambahkan event listener untuk resize
    window.addEventListener('resize', resizeChart);
});

onUnmounted(() => {
    // Hapus listener dan hancurkan instance saat komponen dibongkar
    window.removeEventListener('resize', resizeChart);
    if (myChart) {
        myChart.dispose();
    }
});
</script>

<template>
    <div ref="chartRef" style="width: 100%; height: 500px;"></div>
</template>