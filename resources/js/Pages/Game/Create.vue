<template>
    <Head title="foo" />

    <div v-if="activeStep === 1">
        <h2 class="font-bold pb-4 text-xl">
            Wie won er?
        </h2>
        <ul class="grid grid-cols-2 gap-5">
            <li v-for="player in players">
                <select-player-button @click="form.winner_id = player.id; activeStep++">{{ player.name }}</select-player-button>
            </li>
        </ul>
    </div>
    <div v-if="activeStep === 2">
        <h2 class="font-bold pb-4 text-xl">
            Welke ballen speelde {{ winner.name }}?
        </h2>
        <ul class="grid grid-cols-2 gap-x-5">
            <li v-for="color in colors">
                <button
                    class="block text-lg py-3 rounded-lg border border-gray-200 w-full hover:bg-blue-50 flex justify-center"
                    @click="form.winner_color = color; activeStep++"
                >
                  <pool-ball :type="color" color="#FFB800" class="w-44 h-auto"></pool-ball>
                </button>
            </li>
        </ul>
    </div>
    <div v-if="activeStep === 3">
        <h2 class="font-bold pb-4 text-xl">
            Tegen wie speelde {{ winner.name }}?
        </h2>
        <ul class="grid grid-cols-2 gap-5">
            <li v-for="opponent in opponents">
                <select-player-button @click="form.opponent_id = opponent.id; activeStep++">{{ opponent.name }}</select-player-button>
            </li>
        </ul>
    </div>
    <div v-if="activeStep === 4">
        <h2 class="font-bold pb-4 text-xl">
            Hoe won {{ winner.name }}?
        </h2>
        <ul class="grid grid-cols-3 gap-5">
            <li v-for="method in winningMethods">
                <button
                    class="block text-lg py-3 rounded-lg border border-gray-200 w-full hover:bg-blue-50"
                    @click="form.win_method = method; activeStep++"
                >{{ method }}
                </button>
            </li>
        </ul>
    </div>
    <div v-if="activeStep === 5">
        <h2 class="font-bold pb-4 text-xl">Samenvatting:</h2>
        <span class="bold">Winnaar: </span>{{ winner.name }}<br />
        Speelde: {{ form.winner_color }} <br />
        Tegen: {{ opponent.name }}<br />
        Gewonnen via: {{ form.win_method }}

        <button :disabled="form.processing" @click.prevent="form.post(route('game.store'))" class="bg-green-500 text-white block text-lg py-3 rounded-lg w-full">opslaan</button>
    </div>


</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Default.vue';
import SelectPlayerButton from "@/Components/SelectPlayerButton";
import {useForm} from "@inertiajs/inertia-vue3";
import PoolBall from "@/Components/PoolBall";

const activeStep = 1;

export default {
    layout: Layout,
    components: {
      PoolBall,
        SelectPlayerButton,
        Head,
        Link,
    },
    props: {
        players: Array,
        winningMethods: Array,
        colors: Array
    },
    data() {
        return {
            activeStep: activeStep,
        };
    },
    setup() {
        const form = useForm({
            winner_id: null,
            opponent_id: null,
            winner_color: null,
            win_method: null,
        })

        return {form}
    },
    computed: {
        winner: function () {
            return this.players.filter(player => player.id === this.form.winner_id)[0];
        },
        opponent: function() {
            return this.players.filter(player => player.id === this.form.opponent_id)[0];
        },
        opponents: function () {
            return this.players.filter((player) => {
                return player.id !== this.form.winner_id;
            });
        },
    },

};
</script>
