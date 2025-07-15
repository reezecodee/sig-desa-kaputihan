<script setup>
import * as echarts from 'echarts';
import { onMounted, onUnmounted, ref } from 'vue';

// 1. Siapkan ref untuk elemen DOM chart
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
            text: 'Data Penjualan Mingguan',
            left: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        xAxis: {
            type: 'category',
            data: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                name: 'Penjualan',
                data: [120, 200, 150, 80, 70, 110, 130],
                type: 'bar',
                barWidth: '60%',
                itemStyle: {
                    borderRadius: [5, 5, 0, 0] // Membuat sudut atas bar menjadi tumpul
                }
            }
        ]
    };

    myChart.setOption(option);

    // Tambahkan event listener untuk resize
    window.addEventListener('resize', resizeChart);
});

onUnmounted(() => {
    // Hapus event listener dan hancurkan instance chart
    window.removeEventListener('resize', resizeChart);
    if (myChart) {
        myChart.dispose();
    }
});
</script>

<template>
    <div ref="chartRef" style="width: 100%; height: 500px;"></div>
</template>