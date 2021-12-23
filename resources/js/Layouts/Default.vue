<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-500">
        <div>
            <Link href="/" class="flex p-6 bg-gray-100 shadow rounded-xl mt-10">
                <Logo class="w-96 h-auto fill-current text-gray-500"/>
            </Link>
        </div>

        <div class="w-full sm:max-w-7xl mt-6 px-6 py-4 bg-gray-200 shadow-md overflow-hidden sm:rounded-lg">
            <slot/>
        </div>
    </div>
</template>

<script>
import Logo from '@/Components/IfreshLogo.vue'
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Logo,
        Link,
    }
}
</script>
