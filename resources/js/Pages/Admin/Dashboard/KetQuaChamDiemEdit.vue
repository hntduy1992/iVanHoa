<script setup>
import {ref} from "vue";
import axios from "axios";

const data = [
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
]
const message = ref('')
const callApi = async ()=>{
  const response =  await axios.get('/quan-tri/dashboard/test');
  message.value = response.data.message;
}
</script>

<template>
    <v-row>
        <v-col md="6" lg="6" v-for="dataRow in data" :key="dataRow.id">
            <v-card>
                <v-card-title class="d-flex">
                    Danh hiệu "{{ dataRow.tenDanhHieu }}"
                    <v-spacer></v-spacer>
                    <v-btn color="primary" icon="mdi-plus" density="comfortable"></v-btn>
                </v-card-title>
                <v-messages v-if="message">{{message}}</v-messages>
                    <v-table hover>
                        <thead>
                        <tr>
                            <th>Năm</th>
                            <th>Tổng</th>
                            <th>Đạt chuẩn</th>
                            <th>Tỉ lệ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="dataDetail in dataRow.data" :key="dataDetail.nam">
                            <td>{{ dataDetail.nam }}</td>
                            <td>{{ dataDetail.tongDanhGia }}</td>
                            <td>{{ dataDetail.datChuan }}</td>
                            <td>{{ dataDetail.datChuan * 100 / dataDetail.tongDanhGia }}%</td>

                            <v-menu activator="parent" location="end" transition="slide-x-transition" >
                                <p class="mt-2">
                                    <v-btn density="comfortable" icon="mdi-pencil" color="warning" @click="callApi"></v-btn>
                                    <v-btn density="comfortable" icon="mdi-close"  color="error"></v-btn>
                                </p>
                            </v-menu>
                        </tr>
                        </tbody>
                    </v-table>
            </v-card>
        </v-col>
    </v-row>
</template>

<style scoped>

</style>
