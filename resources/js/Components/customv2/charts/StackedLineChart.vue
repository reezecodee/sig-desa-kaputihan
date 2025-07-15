<script setup>
import * as echarts from 'echarts';
// 1. Perbaiki typo dan pastikan semua yang dibutuhkan di-import
import { ref, onMounted, onUnmounted } from 'vue';

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
            text: 'Tren Akses Mingguan'
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            top: 'bottom',
            data: ['Email', 'Union Ads', 'Video Ads', 'Direct', 'Search Engine']
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
            data: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                name: 'Email',
                type: 'line',
                stack: 'Total',
                data: [120, 132, 101, 134, 90, 230, 210]
            },
            {
                name: 'Union Ads',
                type: 'line',
                stack: 'Total',
                data: [220, 182, 191, 234, 290, 330, 310]
            },
            {
                name: 'Video Ads',
                type: 'line',
                stack: 'Total',
                data: [150, 232, 201, 154, 190, 330, 410]
            },
            {
                name: 'Direct',
                type: 'line',
                stack: 'Total',
                data: [320, 332, 301, 334, 390, 330, 320]
            },
            {
                name: 'Search Engine',
                type: 'line',
                stack: 'Total',
                data: [820, 932, 901, 934, 1290, 1330, 1320]
            }
        ]
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