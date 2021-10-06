<template>
    <Head title="Pool games" />

    <div class="flex flex-row justify-between">
        <div class="border">
            <Link :href="route('game.create')">
                Nieuwe uitslag toevoegen
            </Link>
        </div>
        <div class="border">
            <Link :href="route('player.index')">
                Spelers
            </Link>
        </div>
    </div>

    <h2 class="font-bold pb-4 text-xl">Afgeronde potjes pool:</h2>

    <div v-if="games.length === 0">
        <h3 class="font-semibold text-xl">Er zijn nog geen potjes gespeeld.</h3>
    </div>

    <div v-for="game in games" class="border-b mb-4">
        <h3 class="font-semibold text-lg">#{{ game.id }}:</h3>
        <div class="text-lg">
            <div class="underline">
                Winnaar: <span class="italic">{{ game.winner.name }}</span>
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
