<template>
    <div class="flex flex-row justify-between mb-6 items-center">
        <Link :href="route('game.create')" class="w-72 py-4 block rounded-lg bg-green-600 text-white hover:bg-green-700 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Nieuwe uitslag toevoegen</span>
        </Link>
        <h1 class="text-3xl inline-block font-extrabold">
            {{ title }}
        </h1>
        <Link v-if="! back" :href="route('player.index')" class="w-72 py-4 block rounded-lg bg-green-600 text-white hover:bg-green-700 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Alle spelers
        </Link>
        <Link v-if="back" :href="route('game.index')" class="w-72 py-4 block rounded-lg bg-green-600 text-white hover:bg-green-700 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
            </svg>
            Gespeelde potjes
        </Link>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    props: {
        title: String,
        back: Boolean,
    }
}
</script>
