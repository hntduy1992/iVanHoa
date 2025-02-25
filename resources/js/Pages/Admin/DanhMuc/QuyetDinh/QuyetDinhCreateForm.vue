<script setup>
const props = defineProps({
    id: Number,
    nam: Number,
    soHieu: String,
    trichYeu: String,
    path: String,
})
</script>

<template>
    <v-form>
        <v-text-field variant="outlined" density="comfortable" label="Năm" v-model="props.nam"></v-text-field>
        <v-text-field variant="outlined" density="comfortable" label="Số hiệu" v-model="props.soHieu">
        </v-text-field>
        <v-textarea variant="outlined" density="comfortable" label="Trích yếu" rows="2" no-resize
                    v-model="props.trichYeu"></v-textarea>
        <v-file-input variant="outlined" density="comfortable" label="File" v-model="props.path"></v-file-input>
        <v-divider></v-divider>
    </v-form>
</template>

<style scoped>

</style>
