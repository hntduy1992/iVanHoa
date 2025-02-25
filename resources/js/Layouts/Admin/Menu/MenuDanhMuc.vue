<script setup>
import {router} from "@inertiajs/vue3";

const items = [
    {title: 'Quyết định', href: '/quan-tri/danh-muc/quyet-dinh'},
    {title: 'Danh hiệu', href: '/quan-tri/don-vi/don-vi-con'},
    {title: 'Bộ tiêu chí', href: '/quan-tri/don-vi/danh-sach-tai-khoan'},
    {title: 'Đơn vị thẩm định', href: '/quan-tri/don-vi/danh-sach-tai-khoan'},
    {title: 'Quy trình', href: '/quan-tri/don-vi/danh-sach-tai-khoan'},
    {title: 'Tổ chức', href: '/quan-tri/don-vi/danh-sach-tai-khoan'},
    {title: 'Lịch đánh giá', href: '/quan-tri/don-vi/danh-sach-tai-khoan'},
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
