<template>
    <div>
        <vue3-chart-js v-bind="{ ...pieChart }" class="h-72" />
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
        const pieChart = {
            type: "pie",
            data: props.data,
            options: props.options,
        };

        return {
            pieChart,
        };
    },
};
</script>
