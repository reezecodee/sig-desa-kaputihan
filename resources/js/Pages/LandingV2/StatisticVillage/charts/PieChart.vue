<script setup>
import * as echarts from 'echarts';
import { onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    title: String,
    endpoint: String,
})

// 1. Gunakan 'ref' untuk menampung elemen DOM chart.
//    Ini cara yang lebih deklaratif dan aman di Vue.
const chartRef = ref(null);

// Variabel untuk menyimpan instance chart agar bisa diakses di onUnmounted
let myChart = null;

onMounted(() => {
    // 2. Inisialisasi chart menggunakan '.value' dari ref
    myChart = echarts.init(chartRef.value);

    // 3. Gunakan 'const' untuk option karena tidak akan di-assign ulang
    const option = {
        title: {
            text: props.title, // Judul yang lebih deskriptif
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)' // Tooltip yang lebih informatif
        },
        legend: {
            orient: 'horizontal',
            bottom: 'bottom'
        },
        series: [
            {
                name: 'Sumber Akses',
                type: 'pie',
                radius: '50%',
                data: [
                    { value: 1048, name: 'Mesin Pencari' },
                    { value: 735, name: 'Langsung' },
                    { value: 580, name: 'Email' },
                    { value: 484, name: 'Iklan Afiliasi' },
                    { value: 300, name: 'Iklan Video' }
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };

    myChart.setOption(option);
});

// 4. Hancurkan (dispose) instance chart saat komponen dibongkar/dihilangkan.
//    Ini penting untuk mencegah memory leak di aplikasi Single Page Application (SPA).
onUnmounted(() => {
    if (myChart) {
        myChart.dispose();
    }
});
</script>

<template>
    <div ref="chartRef" style="width: 100%; height: 65vh;"></div>
</template>