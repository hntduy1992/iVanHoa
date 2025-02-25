<script setup>

import {onMounted, reactive, ref} from "vue";
import QuyetDinhCreateForm from "@/Pages/Admin/DanhMuc/QuyetDinh/QuyetDinhCreateForm.vue";
import axios from "axios";

const props = defineProps({
    items: Array
})
const items = ref(props.items)
const loadData = () => {
    axios.get("/api/quyet-dinh/danh-sach").then(res => {
        items.value = res.data.data;
    })
    dialog.value = false
}

const dialog = ref(false)

const quyetDinhModel = reactive({
    id: 0,
    nam: 2024,
    soHieu: 'HHTT',
    trichYeu: 'String',
    path: ''
})
const openCreateForm = () => {
    dialog.value = true
}

</script>

<template>
    <v-row>
        <v-col>
            <v-card>
                <v-card-title class="d-flex align-center">
                    Danh sách các quyết định
                    <v-spacer></v-spacer>
                    <v-btn color="primary" icon="mdi-plus" density="comfortable" @click="openCreateForm"></v-btn>
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
                    <tr v-for="(item,index) in items" :key="item.id">
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
                    <tr v-if="items.length === 0">
                        <td colspan="5">
                            Không có dữ liệu
                        </td>
                    </tr>
                    </tbody>
                </v-table>
            </v-card>
        </v-col>
    </v-row>
    <!--    Dialog-->
    <v-dialog
        v-model="dialog"
        class="w-lg-50 w-md-75 w-100"
    >
        <v-card>
            <v-card-title>Thêm mới quyết định</v-card-title>
            <v-card-text>
                <quyet-dinh-create-form @updateData="loadData"
                                        @close="()=>dialog=false"></quyet-dinh-create-form>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<style scoped>

</style>
