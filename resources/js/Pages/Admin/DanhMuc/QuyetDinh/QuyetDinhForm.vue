<script setup>

import {onMounted, reactive, ref} from "vue";
import axios from "axios";
import {toast} from "vue3-toastify";
import {id} from "vuetify/locale";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    data: Object
})
const formField = reactive({
    id: 0,
    nam: new Date().getFullYear(),
    soHieu: '',
    trichYeu: '',
    path: ''
})
onMounted(() => {
    if (props.data) {
        formField.id = props.data.id
        formField.nam = props.data.nam
        formField.soHieu = props.data.soHieu
        formField.trichYeu = props.data.trichYeu
        formField.path = props.data.path
    }
})

const emits = defineEmits(['updateData', 'close'])


const errors = reactive({
    server: '',
    validate: {}
})

const close = () => {
    emits('close')
}
const save = async () => {
    await axios.post('/quan-tri/danh-muc/quyet-dinh/update', formField)
        .then((response) => {
            if (response.data.success) {
                emits('updateData', response.data.data)
            }
        }).catch((err) => {
            if (err.status === 422)
                errors.validate = err.response.data.errors
            else {
                toast.error('Lỗi server')
            }
        })
}

</script>

<template>
    <v-btn prepend-icon="mdi-arrow-left" @click="router.get('/quan-tri/quyet-dinh')">Trở về</v-btn>

    <v-row class="mt-2">
        <v-col lg="6" md="6" cols="12">
            <v-card>
                <v-card-title>
                    Thông tin chi tiết
                </v-card-title>
                <v-card-text>
                    <span v-if="errors.server" class="text-red">{{ errors.server }}</span>
                    <v-form>
                        <v-text-field class="mb-2" variant="outlined" density="comfortable" label="Năm"
                                      v-model="formField.nam">
                            <template v-slot:details v-if="errors.validate?.nam">
                                <span class="text-red">{{ errors.validate?.nam.join(', ') }}</span>
                            </template>
                        </v-text-field>
                        <v-text-field class="mb-2" variant="outlined" density="comfortable" label="Số hiệu"
                                      v-model="formField.soHieu">
                            <template v-slot:details v-if="errors.validate?.soHieu">
                                <span class="text-red">{{ errors.validate?.soHieu.join(', ') }}</span>
                            </template>
                        </v-text-field>
                        <v-textarea class="mb-2" variant="outlined" density="comfortable" label="Trích yếu" rows="2"
                                    no-resize
                                    v-model="formField.trichYeu"></v-textarea>
                        <v-file-input class="mb-2" variant="outlined" density="comfortable" label="File"
                                      v-model="formField.path"></v-file-input>
                        <v-divider></v-divider>
                        <div class="mt-2 d-flex justify-end">
                            <v-btn prepend-icon="mdi-content-save" color="success" @click="save">Lưu</v-btn>
                            <v-btn prepend-icon="mdi-close" @click="close">Huỷ</v-btn>
                        </div>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>
        <v-col lg="6" md="6" cols="12">
            <h3>Preview</h3>
<!--            <v-card>-->
<!--                <v-card-title>-->
<!--                    Xem trước văn bản-->
<!--                </v-card-title>-->
<!--                <v-card-text>-->
<!--                    <template v-if="!formField.path">-->
<!--                        <span>Vui lòng chọn văn bản</span>-->
<!--                    </template>-->
<!--                </v-card-text>-->
<!--            </v-card>-->
        </v-col>
    </v-row>
</template>

<style scoped>

</style>
