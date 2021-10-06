<template>
    <Head title="Pool players" />

    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pool players
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 gap-4">
                        <div class="border rounded px-6 py-3" v-for="player in players">
                            {{ player.name }}
                        </div>
                    </div>

                    <div class="px-6 py-10 bg-white border-b border-gray-200">
                        <button @click.prevent="showCreateForm = ! showCreateForm" class="bg-green-400 px-6 py-3 text-white rounded hover:bg-green-500 text-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Nieuwe speler toevoegen
                        </button>

                        <transition name="slide-fade">
                            <div v-if="showCreateForm" class="mt-4">
                                <h2 class="text-lg font-bold">Nieuwe speler toevoegen:</h2>

                                <div class="my-4">
                                    <label>Naam:</label>
                                    <input type="text" v-model="form.name"  placeholder="naam" />
                                </div>

                                <div>
                                    <button @click.prevent="form.post(route('player.store'))" :disabled="form.processing" class="bg-green-400 px-6 py-3 text-white rounded hover:bg-green-500 text-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                        </svg>
                                        Opslaan
                                    </button>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Authenticated.vue';
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    components: {
        Layout,
        Head,
        Link,
    },
    props: {
        players: Array
    },
    data: function() {
        return {
            showCreateForm: false,
        }
    },
    setup: function() {
        const form = useForm({
            name: null,
        });

        return { form }
    }
}
</script>

<style>
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(-20px);
    opacity: 0;
    z-index: -5;
}

</style>
