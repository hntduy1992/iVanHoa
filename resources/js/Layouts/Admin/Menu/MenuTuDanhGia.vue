<script setup>
import {router} from "@inertiajs/vue3";

const items = [
    {title: 'Tự đánh giá', href: '/quan-tri/bo-tieu-chi/van-ban'},
    {title: 'Đánh giá đơn vị con', href: '/quan-tri/don-vi/don-vi-con'},
    {title: 'Phản hồi ý kiến', href: '/quan-tri/don-vi/don-vi-con'},
]
</script>

<template>
    <v-btn>
        Đánh giá

        <v-menu activator="parent">
            <v-list>
                <v-list-item
                    v-for="(item, index) in items"
                    :key="index"
                    :value="index"
                    @click="router.get(item.name)"
                >
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </v-btn>
</template>

<style scoped>

</style>
