<script setup>
import {router} from '@inertiajs/vue3'

const props = defineProps({
    label: String,
    items: Array({
        label: String,
        href: String,
        data: Object
    })
})
</script>

<template>
    <v-btn
        id="menu-activator"
        color="primary"
    >
        {{ props.label }}
    </v-btn>

    <v-menu activator="#menu-activator">
        <v-list>
            <v-list-item
                v-for="(item, index) in items"
                :key="index"
                @click="router.get(props.href,props.data )"
            >
                <v-list-item-title>{{ item.label }}</v-list-item-title>
            </v-list-item>
        </v-list>
    </v-menu
</template>

<style scoped>

</style>
