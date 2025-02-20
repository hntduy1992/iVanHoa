<script setup>
import {router} from '@inertiajs/vue3'

const props = defineProps({
    username:String,
})
</script>

<template>
    <template v-if="username">
        <v-btn class="mr-2">
            Chào! {{username}}
            <v-menu activator="parent">
                <v-list>
                    <v-list-item prepend-icon="mdi-account" @click="router.get('/ho-so')">
                        Hồ sơ
                    </v-list-item>
                    <v-list-item prepend-icon="mdi-lock-reset" @click="router.get('/doi-mat-khau')">
                        Đổi mật khẩu
                    </v-list-item>
                    <v-divider class="my-2"/>
                    <v-list-item prepend-icon="mdi-logout" @click="router.get('/dang-xuat')">
                        Đăng xuất
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-btn>
    </template>
</template>

<style scoped>

</style>
