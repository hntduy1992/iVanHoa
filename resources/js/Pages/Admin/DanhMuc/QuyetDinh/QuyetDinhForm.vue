<script setup>

import {router, useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import {toast} from "vue3-toastify";
import PDFViewer from "pdf-viewer-vue";

const props = defineProps({
    data: Object
})

const form = useForm({
    id: 0,
    nam: new Date().getFullYear(),
    soHieu: null,
    trichYeu: null,
    path: null
})
const preview = ref(null)

const submit = () => {
    form.post('/quan-tri/quyet-dinh/them', {
        forceFormData: true,
        onSuccess: () => {
            toast.success("Thêm mới thành công!");
            refresh()
        }
    })
}
const fileChange = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);
}
const clearFile = () => {
    preview.value = null
}
const refresh = () => {
    preview.value = null
    form.reset();
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
                    <v-form @submit.prevent="submit">
                        <v-text-field class="mb-2" variant="outlined" density="comfortable" label="Năm"
                                      v-model="form.nam">

                            <template v-slot:details v-if="form.errors.nam">
                                <span class="text-red">{{ form.errors.nam }}</span>
                            </template>
                        </v-text-field>
                        <v-text-field class="mb-2" variant="outlined" density="comfortable" label="Số hiệu"
                                      v-model="form.soHieu">
                            <template v-slot:details v-if="form.errors.soHieu">
                                <span class="text-red">{{ form.errors.soHieu }}</span>
                            </template>
                        </v-text-field>
                        <v-textarea class="mb-2" variant="outlined" density="comfortable" label="Trích yếu" rows="2"
                                    no-resize
                                    v-model="form.trichYeu"></v-textarea>
                        <v-file-input class="mb-2" variant="outlined" density="comfortable" label="File"
                                      accept="application/pdf"
                                      v-model="form.path"
                                      @change="fileChange"
                                      @click:clear="clearFile"
                                      show-size
                        ></v-file-input>
                        <v-divider></v-divider>
                        <div class="mt-2 d-flex justify-end">
                            <v-btn type="submit" prepend-icon="mdi-content-save" color="success"
                                   :disabled="form.processing">Lưu
                            </v-btn>
                            <v-btn prepend-icon="mdi-refresh" @click="refresh">Hoàn tác</v-btn>
                        </div>
                    </v-form>
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
