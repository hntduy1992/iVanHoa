<script setup>

import {onMounted, ref} from "vue";
import {router} from "@inertiajs/vue3";


const props = defineProps({
    data: Object
})
onMounted(() => {
    console.log(props.data)
})
</script>

<template>
    <v-row>
        <v-col>
            <v-card>
                <v-card-title class="d-flex align-center">
                    Danh sách các quyết định
                    <v-spacer></v-spacer>
                    <v-btn color="primary" icon="mdi-plus" density="comfortable"
                           @click="router.get('/quan-tri/quyet-dinh/them')"></v-btn>
                </v-card-title>

                <v-table>
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số hiệu</th>
                        <th>Trích yếu</th>
                        <th>Năm</th>
                        <th style="width: 150px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item,index) in data.data" :key="item.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ item.soHieu }}</td>
                        <td>{{ item.trichYeu }}</td>
                        <td>{{ item.nam }}</td>
                        <td style="width: 200px">
                            <v-btn icon="mdi-eye" variant="text" color="info"></v-btn>
                            <v-btn icon="mdi-pencil" variant="text" color="warning"></v-btn>
                            <v-btn icon="mdi-minus" variant="text" color="error"></v-btn>
                        </td>
                    </tr>
                    <tr v-if="props.data.data.length === 0">
                        <td colspan="5">
                            Không có dữ liệu
                        </td>
                    </tr>
                    </tbody>
                </v-table>
                <v-pagination
                    v-model="props.data.currentPage"
                    @first="router.get(props.data.firstPageUrl)"
                    @last="router.get(data.lastPageUrl)"
                >

                </v-pagination>
            </v-card>
        </v-col>
    </v-row>
</template>

<style scoped>

</style>
