<template>
    <Head title="Pool games" />

    <navigation-links title="Alle actieve spelers:" :back="true" />

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
import NavigationLinks from "@/Components/NavigationLinks";

export default {
    layout: Layout,
    components: {
        Head,
        Link,
        NavigationLinks,
    },
    props: {
        players: Array
    },
}
</script>
