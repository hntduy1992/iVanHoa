<script setup>
import {Link} from '@inertiajs/vue3'
import DefaultNav from "../Layouts/DefaultNav/Default/DefaultNav.vue";
</script>

<template>
    <v-app id="inspire">
        <v-system-bar class="pa-2 bg-white" height="140">
            <v-container height="140" class="d-flex justify-lg-space-between align-center " >
                <div class="d-flex align-center banner">
                    <img src="/images/logo-thanh-pho-sa-dec.png" alt="logo">
                    <div class="ml-2">
                        <div class="text-h6 font-weight-bold text-left">UBND THÀNH PHỐ SA ĐÉC</div>
                        <div class="text-h5 font-weight-bold">TRANG THÔNG TIN DANH HIỆU VĂN HOÁ</div>
                    </div>
                </div>
            </v-container>
        </v-system-bar>
        <v-app-bar flat color="primary">
            <default-nav></default-nav>
        </v-app-bar>

        <v-main class="bg-grey-lighten-3">
            <v-container>
                <slot></slot>
            </v-container>
        </v-main>
    </v-app>

    <!--    <div class="d-flex flex-column">-->

    <!--        </div>-->
    <!--        <DefaultNav></DefaultNav>-->
    <!--        <slot></slot>-->
    <!--    </div>-->
</template>

<style scoped>

.banner,
img {
    height: 100%;
}
</style>
