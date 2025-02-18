<script setup>

import {router} from "@inertiajs/vue3";
import UserLoginStatus from "@/Layouts/DefaultNav/Default/UserLoginStatus.vue";

const links = [
    {text: 'Trang chủ', href: '/', icon: 'mdi mdi-home'},
    {text: 'Chuyên mục', href: '/chuyen-muc'},
    {text: 'Tin tức', href: '/tin-tuc'},
]
</script>

<template>
    <v-app-bar class="px-3"
               density="compact"
               flat color="primary">
        <v-container>
            <v-spacer></v-spacer>
            <v-tabs
                align-tabs="center"
            >
                <v-tab
                    v-for="link of links" :key="link"
                    :text="link.text"
                    @click="router.get(link.href)"
                ></v-tab>
            </v-tabs>
            <v-spacer></v-spacer>

        </v-container>
    </v-app-bar>
</template>

<style scoped>

</style>
