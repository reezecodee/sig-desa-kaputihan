<script setup>
import * as echarts from 'echarts';
import { onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    title: String,
    data: Object,
})

console.log(props.data);

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
            text: props.title,
            left: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            containLabel: true // <-- INI YANG PALING PENTING
        },
        xAxis: {
            type: 'category',
            data: props.data?.label,
            axisLabel: {
                interval: 0,
                rotate: 30
            }
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                name: 'Sarana & Prasarana',
                data: props.data?.jumlah,
                type: 'bar',
                barWidth: '60%',
                itemStyle: {
                    borderRadius: [5, 5, 0, 0], // Membuat sudut atas bar menjadi tumpul
                    color: function (params) {
                        const hue = (params.dataIndex * 45) % 360; // Mengubah hue tiap bar
                        return `hsl(${hue}, 70%, 60%)`; // Format warna HSL otomatis
                    }
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