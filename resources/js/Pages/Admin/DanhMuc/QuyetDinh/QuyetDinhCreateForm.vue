<script setup>

import {onMounted, reactive, ref} from "vue";
import axios from "axios";
import {useToast} from "vue-toast-notification";

const $toast = useToast();

const emits = defineEmits(['updateData'])

const formField = reactive({
    nam: new Date().getFullYear(),
    soHieu: '',
    trichYeu: '',
    path: ''
})
const errors = reactive({
    server: '',
    validate: {}
})

const save = async () => {
    await axios.post('/quan-tri/danh-muc/quyet-dinh/create', formField)
        .then((response) => {

        }).catch((err) => {
            if (err.status === 422)
                errors.validate = err.response.data.errors
            else {
                $toast.error('Lỗi máy chủ')
            }
        })
}
onMounted(() => {

})
</script>

<template>
    <span v-if="errors.server" class="text-red">{{ errors.server }}</span>
    <v-form>
        <v-text-field class="mb-2" variant="outlined" density="comfortable" label="Năm" v-model="formField.nam">
            <template v-slot:details v-if="errors.validate?.nam">
                <span class="text-red">{{ errors.validate?.nam.join(', ') }}</span>
            </template>
        </v-text-field>
        <v-text-field class="mb-2" variant="outlined" density="comfortable" label="Số hiệu" v-model="formField.soHieu">
            <template v-slot:details v-if="errors.validate?.soHieu">
                <span class="text-red">{{ errors.validate?.soHieu.join(', ') }}</span>
            </template>
        </v-text-field>
        <v-textarea class="mb-2" variant="outlined" density="comfortable" label="Trích yếu" rows="2" no-resize
                    v-model="formField.trichYeu"></v-textarea>
        <v-file-input class="mb-2" variant="outlined" density="comfortable" label="File"
                      v-model="formField.path"></v-file-input>
        <v-divider></v-divider>
        <div class="mt-2 d-flex justify-end">
            <v-btn prepend-icon="mdi-content-save" color="success" @click="save">Lưu</v-btn>
            <v-btn prepend-icon="mdi-refresh" color="info">Làm mới</v-btn>
            <v-btn prepend-icon="mdi-close">Huỷ</v-btn>
        </div>
    </v-form>
</template>

<style scoped>

</style>
