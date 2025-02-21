<script setup>

import AdminLoginStatus from "../Admin/AdminLoginStatus.vue";
import MenuDonVi from "./Menu/MenuDonVi.vue";
import MenuToChucDanhGia from "./Menu/MenuToChucDanhGia.vue";
import MenuTuDanhGia from "./Menu/MenuTuDanhGia.vue";
import MenuThamDinh from "./Menu/MenuThamDinh.vue";
import {router} from "@inertiajs/vue3";


</script>

<template>
    <v-app-bar flat color="primary">
        <v-container class="mx-auto d-flex align-center justify-center">
            <v-btn icon="mdi-home"
                   @click="router.get({name: 'admin.dashboard'})"
            ></v-btn>

            <MenuDonVi></MenuDonVi>
            <MenuToChucDanhGia></MenuToChucDanhGia>
            <MenuTuDanhGia></MenuTuDanhGia>
            <MenuThamDinh></MenuThamDinh>
            <v-spacer></v-spacer>

            <admin-login-status username="Admin"></admin-login-status>
        </v-container>
    </v-app-bar>
</template>

<style scoped>
button + button {
    margin-left: 5px;
}
</style>
