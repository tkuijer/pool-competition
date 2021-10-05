<template>
    <Head title="Welcome" />

    <pre>
    {{ games }}
    </pre>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
        Link,
    },
    props: {
        games: Array
    },
}
</script>
