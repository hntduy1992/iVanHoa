<script setup>
import {Link} from '@inertiajs/vue3'
</script>

<template>
    <div class="d-flex flex-column">
        <div class="py-1">
            <v-container class="d-flex align-end">
                <img style="height: 100px" src="/images/logo-thanh-pho-sa-dec.png" alt="logo">
                <div class="ml-2 d-flex flex-column">
                    <span style="font-size: 14pt">UBND THÀNH PHỐ SA ĐÉC</span>
                    <span style="font-size: 30pt">Trang thông tin văn hoá</span>
                </div>
            </v-container>
        </div>
        <nav class="py-1">
           <v-container>
               <Link class="menu-link" href="/">Trang chủ</Link>
           </v-container>
        </nav>
        <slot></slot>
    </div>
</template>

<style scoped>
.menu-link{
    text-decoration: none;
    font-size: 15pt;
    padding: 10px 15px;
}
</style>
