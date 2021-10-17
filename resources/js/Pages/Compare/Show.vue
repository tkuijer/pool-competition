<template>
  <Head title="Pool games" />

  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium"></div>
    <div class="w-1/4 text-2xl">{{ player1.playerName }}</div>
    <div class="w-1/4 text-2xl">{{ player2.playerName }}</div>
  </div>
  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium">Aantal potjes gespeeld</div>
    <div class="w-1/4 text-2xl">{{ player1.totalPlayedGames }}</div>
    <div class="w-1/4 text-2xl">{{ player2.totalPlayedGames }}</div>
  </div>
  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium">Aantal potjes gewonnen</div>
    <div class="w-1/4 text-2xl">{{ player1.totalWonGames }} <span class="text-gray-400">({{ player1.percentageWonGames }}%)</span></div>
    <div class="w-1/4 text-2xl">{{ player2.totalWonGames }} <span class="text-gray-400">({{ player2.percentageWonGames }}%)</span></div>
  </div>
  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium">Gewonnen door fout tegenstander</div>
    <div class="w-1/4 text-2xl">{{ player1.wonGamesByBlackBallOpponent }}
      <span class="text-gray-400 block text-base">{{ player1.percentageWonGamesByBlackBallOpponent }}% van alle wins</span>
    </div>
    <div class="w-1/4 text-2xl">{{ player2.wonGamesByBlackBallOpponent }}
      <span class="text-gray-400 block text-base">{{ player2.percentageWonGamesByBlackBallOpponent }}% van alle wins</span>
    </div>
  </div>
  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium">Aantal potjes verloren</div>
    <div class="w-1/4 text-2xl">{{ player1.totalLostGames }} <span class="text-gray-400">({{ player1.percentageLostGames }}%)</span></div>
    <div class="w-1/4 text-2xl">{{ player2.totalLostGames }} <span class="text-gray-400">({{ player2.percentageLostGames }}%)</span></div>
  </div>
  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium">Dag met meeste wins</div>
    <div class="w-1/4 text-2xl">{{ player1.bestPlayingDay.dayName }} <span class="text-gray-400 block text-base">{{ player1.bestPlayingDay.wins }} overwinningen</span></div>
    <div class="w-1/4 text-2xl">{{ player2.bestPlayingDay.dayName }} <span class="text-gray-400 block text-base">{{ player2.bestPlayingDay.wins }} overwinningen</span></div>
  </div>
  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium">Meest gewonnen van</div>
    <div class="w-1/4 text-2xl">{{ player1.mostDefeatedPlayer.player }} <span class="text-gray-400 block text-base">{{ player1.mostDefeatedPlayer.amount }}x verslagen</span></div>
    <div class="w-1/4 text-2xl">{{ player2.mostDefeatedPlayer.player }} <span class="text-gray-400 block text-base">{{ player2.mostDefeatedPlayer.amount }}x verslagen</span></div>
  </div>
  <div class="flex py-3 border-b border-gray-200">
    <div class="w-1/2 font-medium">Meest gespeelde bal</div>
    <div class="w-1/4 text-2xl">{{ player1.mostPlayedColor.color }} <span class="text-gray-400 block text-base">{{ player1.mostPlayedColor.amount }} van {{ player1.totalPlayedGames}} potjes</span></div>
    <div class="w-1/4 text-2xl">{{ player2.mostPlayedColor.color }} <span class="text-gray-400 block text-base">{{ player2.mostPlayedColor.amount }} van {{ player2.totalPlayedGames}} potjes</span></div>
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
    player1: Object,
    player2: Object,
  },
}
</script>
