<template>
    <div>
        <vue3-chart-js v-bind="{ ...barChart }" class="h-72" />
    </div>
</template>

<script>
import Vue3ChartJs from "@j-t-mcc/vue3-chartjs";

export default {
    props: {
        data: Object,
        options: Object,
    },
    components: {
        Vue3ChartJs,
    },
    setup(props) {
        const barChart = {
            type: "bar",
            data: props.data,
            options: props.options,
        };

        return {
            barChart: barChart,
        };
    },
};
</script>
