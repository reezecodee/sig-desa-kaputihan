<script setup>
import * as echarts from 'echarts';
// 1. Perbaiki typo import dan tambahkan 'ref'
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    title: String,
    data: Object,
})

// Siapkan ref untuk elemen DOM
const chartRef = ref(null);

// Variabel untuk menyimpan instance chart
let myChart = null;

// Fungsi untuk resize
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
            text: props.title,
            left: 'center',
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            // Pindahkan legend ke atas agar lebih rapi
            bottom: 'bottom'
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '10%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        yAxis: {
            type: 'category',
            data: props.data.rentang_umur
        },
        series: [
            {
                name: 'Laki-laki',
                type: 'bar',
                data: props.data.laki_laki
            },
            {
                name: 'Perempuan',
                type: 'bar',
                data: props.data.perempuan
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