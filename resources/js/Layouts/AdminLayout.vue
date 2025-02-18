<template>
    <v-app id="inspire">
        <v-app-bar flat color="primary">
            <v-container class="mx-auto d-flex align-center justify-center">
                <v-avatar
                    class="me-4 "
                    color="grey-darken-1"
                    size="32"
                ></v-avatar>

                <v-btn
                    v-for="link in links"
                    :key="link"
                    :text="link"
                    variant="text"
                ></v-btn>

                <v-spacer></v-spacer>

                <user-login-status username="Admin"></user-login-status>
            </v-container>
        </v-app-bar>

        <v-main class="bg-grey-lighten-3">
            <v-container>
                <slot></slot>
            </v-container>
        </v-main>
    </v-app>
</template>

<script setup>
import UserLoginStatus from "@/Layouts/DefaultNav/Default/UserLoginStatus.vue";

const links = [
    'Dashboard',
    'Chấm điểm',
    'Thẩm định',
    'Bài viết',
]
</script>

<script>
export default {
    data: () => ({
        links: [
            'Dashboard',
            'Messages',
            'Profile',
            'Updates',
        ],
    }),
}
</script>
