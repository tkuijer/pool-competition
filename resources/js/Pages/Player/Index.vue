<template>
    <Head title="Pool games" />

    <h2 class="font-bold pb-4 text-xl">All active players:</h2>

    <div v-for="player in players" class="border-b mb-4">
        <h3 class="font-semibold text-lg">Player #{{ player.id }}:</h3>
        <div class="text-lg">
            {{ player.name }}
            <br />
            Iets met statistiekjes hier
        </div>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Default.vue';

export default {
    layout: Layout,
    components: {
        Head,
        Link,
    },
    props: {
        players: Array
    },
}
</script>
