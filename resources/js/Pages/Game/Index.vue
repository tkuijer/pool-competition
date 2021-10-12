<template>
    <Head title="Pool games" />

    <navigation-links title="Gespeelde potjes pool:" />

    <div v-if="games.total === 0">
        <h3 class="font-semibold text-xl">Er zijn nog geen potjes gespeeld.</h3>
    </div>

    <div class="flex justify-center gap-4 h-96">
        <pie-chart :data="stats.winning_balls" :options="{
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }" />
        <!--        <pie-chart :data="stats.winning_players" :options="{
                    plugins: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }" />-->
    </div>

    <div v-for="game in games.data" class="border-b mb-4">
        <h3 class="font-semibold text-lg">#{{ game.id }} op {{ game.played_at }}:</h3>
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

    <div v-if="games.links.length > 3" class="mt-8">
        <div class="mx-auto flex flex-wrap justify-center">
            <Link class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :href="games.first_page_url">1e Pagina</Link>
            <template v-for="(link, key) in games.links">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
            <Link class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :href="games.last_page_url">laatste pagina</Link>
        </div>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Default.vue';
import NavigationLinks from "@/Components/NavigationLinks";
import PieChart from "@/Components/PieChart";

export default {
    layout: Layout,
    components: {
        Head,
        Link,
        NavigationLinks,
        PieChart,
    },
    props: {
        games: Object,
        stats: Object,
    },
}
</script>
