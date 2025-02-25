<script setup>

import {reactive, ref} from "vue";
import QuyetDinhCreateForm from "@/Pages/Admin/DanhMuc/QuyetDinh/QuyetDinhCreateForm.vue";

const dialog = ref(false)

const quyetDinhModel = reactive({
    id: 0 ,
    nam: 2024,
    soHieu: 'HHTT',
    trichYeu: 'String',
    path: ''
})
const openCreateForm = () => {
    dialog.value = true
}

const save = ()=>{
    console.log(quyetDinhModel)
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
                    <tr>
                        <td>1</td>
                        <td>01/QD-UBND-HC</td>
                        <td>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut
                            l
                        </td>
                        <td>2024</td>
                        <td style="width: 200px">
                            <v-btn icon="mdi-eye" variant="text" color="info"></v-btn>
                            <v-btn icon="mdi-pencil" variant="text" color="warning"></v-btn>
                            <v-btn icon="mdi-minus" variant="text" color="error"></v-btn>
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
                <quyet-dinh-create-form ></quyet-dinh-create-form>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<style scoped>

</style>
