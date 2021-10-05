<template>
    <Head title="Pool games" />

    <h2 class="font-bold pb-4 text-xl">Completed pool games:</h2>

    <div v-for="game in games" class="border-b mb-4">
        <h3 class="font-semibold text-lg">Game #{{ game.id }}:</h3>
        <div class="text-lg ">
            <div class="underline">
                Winner: <span class="italic">{{ game.winner.name }}</span>
            </div>
            Playing the {{ game.winner.pivot.color }} ball. Won by: {{ game.win_method }}
        </div>
        <div>
            Opponent: <span class="italic">{{ game.loser.name }}</span>
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
        games: Array
    },
}
</script>
