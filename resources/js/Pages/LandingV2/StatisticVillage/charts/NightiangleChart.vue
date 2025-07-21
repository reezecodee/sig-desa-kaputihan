<script setup>
import * as echarts from 'echarts';
import { onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    title: String,
    endpoint: String,
})

// 1. Gunakan 'ref' untuk menampung elemen DOM
const chartRef = ref(null);

// Variabel untuk menyimpan instance chart
let myChart = null;

// 2. Definisikan fungsi resize agar bisa dihapus nanti
const resizeChart = () => {
    if (myChart) {
        myChart.resize();
    }
};

onMounted(() => {
    // Inisialisasi chart menggunakan 'ref'
    myChart = echarts.init(chartRef.value);

    // Gunakan 'const' untuk option
    const option = {
        title: {
            text: props.title,
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
            top: 'bottom'
        },
        toolbox: {
            show: true,
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: false },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        color: [
            '#5470C6', '#91CC75', '#FAC858', '#EE6666',
            '#73C0DE', '#3BA272', '#FC8452', '#9A60B4'
        ],
        series: [
            {
                name: 'Data Statistik',
                type: 'pie',
                radius: ['25%', '75%'],
                center: ['50%', '50%'],
                roseType: 'area',
                itemStyle: {
                    borderRadius: 8
                },
                label: {
                    show: true,
                    formatter: '{d}%',
                    position: 'inside',
                    color: '#fff',
                    fontSize: 12
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: 16,
                        fontWeight: 'bold'
                    }
                },
                data: [
                    { value: 40, name: 'Pendidikan' },
                    { value: 38, name: 'Kesehatan' },
                    { value: 32, name: 'Ekonomi' },
                    { value: 30, name: 'Infrastruktur' },
                    { value: 28, name: 'Pertanian' },
                    { value: 26, name: 'Sosial' },
                    { value: 22, name: 'Keamanan' },
                    { value: 18, name: 'Lainnya' }
                ]
            }
        ]
    };

    myChart.setOption(option);

    // 3. Tambahkan event listener untuk resize
    window.addEventListener('resize', resizeChart);
});

// 4. Hancurkan instance dan hapus event listener saat komponen dibongkar
onUnmounted(() => {
    window.removeEventListener('resize', resizeChart);
    if (myChart) {
        myChart.dispose();
    }
});
</script>

<template>
    <div ref="chartRef" style="width: 100%; height: 65vh;"></div>
</template>