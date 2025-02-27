<script setup>

import {router, useForm} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import {toast} from "vue3-toastify";

const props = defineProps({
    data: Object
})

const emit = defineEmits(["OnChooseFile"])
const form = useForm({
    id: props.data?.id ? props.data.id : 0,
    nam: props.data?.nam ? props.data.nam : new Date().getFullYear(),
    soHieu: props.data?.soHieu ? props.data.soHieu : '',
    trichYeu: props.data?.trichYeu ? props.data.trichYeu : '',
    path: props.data?.path ? props.data.path : '',
})
const allowChangeFile = ref(false)
const submit = () => {
    if (props.data) {
        form.post(`/quan-tri/quyet-dinh/${props.data.id}/cap-nhat`, {
            forceFormData: true,
            onSuccess: () => {
                toast.success("Cập nhật thành công!");
            }
        })
        return;
    }
    form.post('/quan-tri/quyet-dinh/them', {
        forceFormData: true,
        onSuccess: () => {
            toast.success("Thêm mới thành công!");
            refresh()
        }
    })
}
const fileChange = (e) => {
    emit("OnChooseFile", e.target.files[0])
}
const clearFile = () => {
    emit("OnChooseFile", null)
}
const refresh = () => {
    // allowChangeFile.value = false
    // clearFile()
    // form.reset();
    this.reload({
        fresh: true,
    })
}
</script>

<template>

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

        <div class="mb-2" v-if="!allowChangeFile && form.path">
            <label class="mr-2">File</label>
            <a :href="'/storage/'+form.path" target="_blank" class="mr-2">
                <v-chip prepend-icon="mdi-file" color="success" variant="elevated">{{ form.path }}</v-chip>
            </a>
            <v-btn icon="mdi-file-restore" density="comfortable" color="error"
                   @click="allowChangeFile=true"></v-btn>
        </div>

        <v-file-input class="mb-2" variant="outlined" density="comfortable"
                      v-if="allowChangeFile || !form.path"
                      accept="application/pdf"
                      :label="form.path"
                      v-model="form.path"
                      @change="fileChange"
                      @click:clear="clearFile"
                      show-size
        ></v-file-input>
        <v-divider></v-divider>
        <div class="mt-2 d-flex justify-end">
            <v-btn type="submit" prepend-icon="mdi-content-save" color="success"
                   :disabled="form.processing">
                <template v-if="props.data">Cập nhật</template>
                <template v-else>Thêm mới</template>
            </v-btn>
            <v-btn prepend-icon="mdi-refresh" @click="refresh">Hoàn tác</v-btn>
        </div>
    </v-form>

</template>

<style scoped>

</style>
