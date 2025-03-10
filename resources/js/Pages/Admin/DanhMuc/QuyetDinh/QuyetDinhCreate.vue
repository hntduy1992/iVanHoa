<script setup>

import {router, useForm} from "@inertiajs/vue3";
import PDFViewer from "pdf-viewer-vue";
import {ref} from "vue";
import {toast} from "vue3-toastify";

const preview = ref(null)
const chooseFile = (file) => {
    if (!file) {
        preview.value = null;
        return;
    }
    preview.value = URL.createObjectURL(file);
}

// Data
const form = useForm({
    id: 0,
    nam: new Date().getFullYear(),
    soHieu: '',
    trichYeu: '',
    path: '',
})

// Form event
const submit = () => {
    form.post('/quan-tri/quyet-dinh/them', {
        forceFormData: true,
        onSuccess: () => {
            toast.success("Thêm mới thành công!");
        }
    })
}
const resetForm = () => {
    form.reset()
    form.clearErrors()
}
</script>

<template>
    <v-btn prepend-icon="mdi-arrow-left" @click="router.get('/quan-tri/quyet-dinh')">Trở về</v-btn>


    <v-card class="mt-2">
        <v-card-title>
            <h2>Thông tin chi tiết</h2>
        </v-card-title>
        <v-card-text>
            <v-form>
                <v-row>
                    <v-col lg="6" md="6" cols="12">
                        <v-text-field variant="outlined" density="comfortable" label="Năm"
                                      v-model="form.nam">

                            <template v-slot:details v-if="form.errors.nam">
                                <span class="text-red">{{ form.errors.nam }}</span>
                            </template>
                        </v-text-field>
                    </v-col>
                    <v-col lg="6" md="6" cols="12">
                        <v-text-field variant="outlined" density="comfortable" label="Số hiệu"
                                      v-model="form.soHieu">
                            <template v-slot:details v-if="form.errors.soHieu">
                                <span class="text-red">{{ form.errors.soHieu }}</span>
                            </template>
                        </v-text-field>
                    </v-col>
                    <v-col cols="12">
                        <v-textarea variant="outlined" density="comfortable" label="Trích yếu" rows="2"
                                    no-resize
                                    v-model="form.trichYeu"></v-textarea>
                    </v-col>

                    <v-col cols="12">
                        <v-label class="pe-2">File văn bản:</v-label>
                        <v-btn icon="mdi-file-document-plus-outline" color="info"
                               @click="this.$refs.file.click()" v-if="!form.path"></v-btn>
                        <v-file-input ref="file" accept="application/pdf" variant="underlined"
                                      :class="form.path?'':'d-none'"
                                      v-model="form.path"
                                      show-size
                                      prepend-icon="mdi-file-document-plus-outline"
                                      @click:prepend.prevent="console.log('click')"
                        >
                        </v-file-input>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
        <v-card-actions class="justify-end">
            <v-btn variant="elevated" prepend-icon="mdi-content-save" color="success"
                   :disabled="form.processing"
                   @click="submit">
                Thêm mới
            </v-btn>
            <v-btn variant="elevated" prepend-icon="mdi-refresh" @click="resetForm">Hoàn tác</v-btn>
        </v-card-actions>
    </v-card>
</template>

<style scoped>

</style>
