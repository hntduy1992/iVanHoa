<script setup>
import {ref} from "vue";
import axios from "axios";

const data = ref([
    {
        id: 1,
        tenDanhHieu: 'Ấp văn hoá',
        data: [
            {nam: 2024, tongDanhGia: 10, datChuan: 10},
            {nam: 2023, tongDanhGia: 10, datChuan: 10},
            {nam: 2022, tongDanhGia: 10, datChuan: 10},
            {nam: 2021, tongDanhGia: 10, datChuan: 10},
            {nam: 2020, tongDanhGia: 10, datChuan: 10},
            {nam: 2019, tongDanhGia: 10, datChuan: 10},
            {nam: 2018, tongDanhGia: 10, datChuan: 10},
        ]
    },
])
const loadFromDB = () => {

}
const edit = ref(false)
</script>

<template>
    <v-row>
        <v-col md="6" lg="6" v-for="dataRow in data" :key="dataRow.id">
            <v-card>
                <v-card-title class="d-flex">
                    Danh hiệu "{{ dataRow.tenDanhHieu }}"
                    <v-spacer></v-spacer>
                    <v-btn color="primary" icon="mdi-plus" density="comfortable"></v-btn>

                    <template v-if="edit">
                        <v-btn density="comfortable" icon="mdi-content-save" color="success" @click="edit=!edit"></v-btn>
                        <v-btn density="comfortable" icon="mdi-refresh" color="info"></v-btn>
                    </template>
                    <template v-else>
                        <v-btn color="warning" icon="mdi-pen" density="comfortable" @click="edit=!edit"></v-btn>
                    </template>

                </v-card-title>
                <v-table hover>
                    <thead>
                    <tr>
                        <th>Năm</th>
                        <th>Tổng</th>
                        <th>Đạt chuẩn</th>
                        <th>Tỉ lệ</th>
                        <th style="width: 80px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dataDetail in dataRow.data" :key="dataDetail.nam">
                        <td>{{ dataDetail.nam }}</td>
                        <td>
                            <template v-if="edit">
                                <v-text-field
                                    v-model="dataDetail.tongDanhGia"
                                    variant="outlined"
                                    hide-details density="comfortable"
                                ></v-text-field>
                            </template>
                            <template v-else> {{ dataDetail.tongDanhGia }}</template>
                        </td>
                        <td>
                            <template v-if="edit">
                                <v-text-field hide-details density="comfortable"
                                              v-model="dataDetail.datChuan"
                                              variant="outlined"
                                ></v-text-field>
                            </template>
                            <template v-else> {{ dataDetail.datChuan }}</template>
                        </td>
                        <td>{{ dataDetail.datChuan * 100 / dataDetail.tongDanhGia }}%</td>
                        <td class="d-flex align-center">
                            <v-btn density="comfortable" variant="text" icon="mdi-minus" color="error"></v-btn>
                        </td>
                    </tr>
                    </tbody>
                </v-table>
            </v-card>
        </v-col>
    </v-row>
</template>

<style scoped>

</style>
