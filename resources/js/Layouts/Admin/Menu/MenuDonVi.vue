<script setup>
import {router} from "@inertiajs/vue3";

const items = [
    {title: 'Thông tin', href: '/quan-tri/don-vi/thong-tin-don-vi'},
    {title: 'Đơn vị con', href: '/quan-tri/don-vi/don-vi-con'},
    {title: 'Danh sách tài khoản', href: '/quan-tri/don-vi/danh-sach-tai-khoan'}
]
</script>

<template>
    <v-btn>
        Đơn vị

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
