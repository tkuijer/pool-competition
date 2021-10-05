<template>
  <Head title="foo"/>

  <div v-if="activeStep === 'selectPlayers'">

    <h2 class="font-bold pb-4 text-xl">
      <template v-if="! challengerIsSet">selecteer speler</template>
      <template v-if="challengerIsSet">{{ challenger.name }} vs.</template>
    </h2>
    <ul class="grid grid-cols-2 gap-5">
      <li v-for="player in selectablePlayers">
        <select-player-button @click="selectPlayer(player)">{{ player.name }}</select-player-button>
      </li>
    </ul>
  </div>
  <div v-if="activeStep === 'selectColor'">
    Wat speelt {{ challenger.name }}?
    <ul class="grid grid-cols-2 gap-x-5">
      <li v-for="color in colors">
        <button
            class="block text-lg py-3 rounded-lg border border-gray-200 w-full hover:bg-blue-50"
            @click="selectColor(color)"
        >{{ color }}
        </button>
      </li>
    </ul>
  </div>
  <div v-if="activeStep === 'selectWinner'">
    Wie won?
    <ul class="grid grid-cols-2 gap-x-5">
      <li v-for="player in activePlayers">
        <button
            class="block text-lg py-3 rounded-lg border border-gray-200 w-full hover:bg-blue-50"
            @click="selectWinner(player)"
        >{{ player.name }}
        </button>
      </li>
    </ul>
  </div>
  <div v-if="activeStep === 'selectWinningMethod'">
    Hoe won {{ winner.name }}?
    <ul class="grid grid-cols-3 gap-x-5">
      <li v-for="method in winningMethods">
        <button
            class="block text-lg py-3 rounded-lg border border-gray-200 w-full hover:bg-blue-50"
            @click="selectWinningMethod(method)"
        >{{ method }}
        </button>
      </li>
    </ul>
  </div>
  <div v-if="activeStep === 'submitData'">
    <button @click="submitData" class="bg-green-500 text-white block text-lg py-3 rounded-lg w-full">opslaan</button>
  </div>


</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Default.vue';
import SelectPlayerButton from "@/Components/SelectPlayerButton";

export default {
  layout: Layout,
  components: {
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
      challenger: null,
      challengerColor: null,
      opponent: null,
      winner: null,
      winningMethod: null
    };
  },
  methods: {
    selectPlayer: function(player) {
      if (!this.challengerIsSet) {
        this.challenger = player;
        return;
      }

      this.opponent = player;
    },
    selectColor: function(color) {
      this.challengerColor = color;
    },
    selectWinner: function(player) {
      this.winner = player;
    },
    selectWinningMethod: function(method) {
      this.winningMethod = method;
    },
    submitData: function() {
      this.$inertia.visit(this.route('game.store'), {
        method: 'post',
        data: {
          challenger: this.challenger,
          opponent: this.opponent,
          challengerColor: this.challengerColor,
          winner: this.winner,
          winningMethod: this.winningMethod
        }
      });
    }
  },
  computed: {
    challengerIsSet: function() {
      return this.challenger !== null;
    },
    opponentIsSet: function() {
      return this.opponent !== null;
    },
    playersAreSelected: function() {
      return this.challengerIsSet && this.opponentIsSet;
    },
    colorIsSelected: function() {
      return this.challengerColor !== null;
    },
    winnerIsSelected: function() {
      return this.winner !== null;
    },
    winningMethodIsSelected: function() {
      return this.winningMethod !== null;
    },
    selectablePlayers: function() {
      if (!this.challenger) {
        return this.players;
      }

      return this.players.filter((player) => {
        return player !== this.challenger;
      });

    },
    activePlayers: function() {
      return [
        this.challenger,
        this.opponent
      ];
    },
    activeStep: function() {
      if (!this.playersAreSelected) {
        return 'selectPlayers';
      }

      if (!this.colorIsSelected) {
        return 'selectColor';
      }

      if (!this.winnerIsSelected) {
        return 'selectWinner';
      }

      if (!this.winningMethodIsSelected) {
        return 'selectWinningMethod';
      }

      return 'submitData';

    }
  },

};
</script>
