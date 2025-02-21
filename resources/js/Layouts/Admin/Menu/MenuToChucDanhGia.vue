<script setup>
import {router} from "@inertiajs/vue3";

const items = [
    {title: 'Văn bản', href: '/quan-tri/bo-tieu-chi/van-ban'},
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
        Tổ chức đánh giá

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
