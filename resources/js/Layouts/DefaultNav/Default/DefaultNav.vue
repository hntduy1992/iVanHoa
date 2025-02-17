<script setup>

import {Link} from "@inertiajs/vue3";
import LinkButton from "@/Layouts/DefaultNav/Default/LinkButton.vue";
import UserLoginStatus from "@/Layouts/DefaultNav/Default/UserLoginStatus.vue";

const links = [
    {text: 'Trang chủ', href: '/', icon: 'mdi mdi-home'},
    {text: 'Chuyên mục', href: '/chuyen-muc'},
    {text: 'Tin tức', href: '/tin-tuc'},
]
</script>

<template>
    <v-container class="mx-auto d-flex align-center justify-center">
        <LinkButton v-for="link of links" :key="link" :href="link.href" :icon="link.icon">{{ link.text }}</LinkButton>

        <v-spacer></v-spacer>

        <UserLoginStatus></UserLoginStatus>
    </v-container>
</template>

<style scoped>

</style>
