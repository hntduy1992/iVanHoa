<script setup>
import {router} from "@inertiajs/vue3";

const items = [
    {title: 'Quyết định', href: '/quan-tri/quyet-dinh'},
    {title: 'Danh hiệu', href: '/'},
    {title: 'Bộ tiêu chí', href: '/'},
    {title: 'Đơn vị thẩm định', href: '/'},
    {title: 'Quy trình', href: '/'},
    {title: 'Tổ chức', href: '/'},
    {title: 'Lịch đánh giá', href: '/'},
]
</script>

<template>
    <v-btn>
        Danh mục

        <v-menu activator="parent">
            <v-list>
                <v-list-item
                    v-for="(item, index) in items"
                    :key="index"
                    :value="index"
                    @click="router.get(item.href)"
                >
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </v-btn>
</template>

<style scoped>

</style>
