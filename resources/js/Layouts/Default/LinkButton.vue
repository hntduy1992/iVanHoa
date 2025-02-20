<script setup>
import {Link, router} from "@inertiajs/vue3";

const props = defineProps({
    href: String,
    icon: String,
})
</script>

<template>
    <Link :href="props.href" as="v-btn">
        <v-btn v-if="props.icon" :icon="props.icon"></v-btn>
        <v-btn v-else>
            <slot></slot>
        </v-btn>
    </Link>
</template>

<style scoped>

</style>
