<template>
    <v-app id="inspire">
        <admin-nav/>
        <v-main class="bg-grey-lighten-3">
            <v-container>
                <slot></slot>
            </v-container>
        </v-main>
    </v-app>
</template>

<script setup>

import AdminNav from "../Layouts/Admin/AdminNav.vue";
</script>

