<script setup>

import QuyetDinhForm from "@/Pages/Admin/DanhMuc/QuyetDinh/QuyetDinhForm.vue";
import {router} from "@inertiajs/vue3";
import PDFViewer from "pdf-viewer-vue";
import {ref} from "vue";

const preview = ref(null)
const chooseFile = (file) => {
    if (!file) {
        preview.value = null;
        return;
    }
    preview.value = URL.createObjectURL(file);
}

</script>

<template>
    <v-btn prepend-icon="mdi-arrow-left" @click="router.get('/quan-tri/quyet-dinh')">Trở về</v-btn>

    <v-row class="mt-1">
        <v-col lg="6" md="6" cols="12">
            <v-card>
                <v-card-title>
                    Thông tin chi tiết
                </v-card-title>
                <v-card-text>
                    <quyet-dinh-form
                        @OnChooseFile="chooseFile"></quyet-dinh-form>
                </v-card-text>
            </v-card>
        </v-col>
        <v-col lg="6" md="6" cols="12" v-if="preview">
            <h3>Preview</h3>
            <PDFViewer
                :source="preview"
                rendering-text="Đang tải bảng xem trước"
            ></PDFViewer>
        </v-col>
    </v-row>
</template>

<style scoped>

</style>
