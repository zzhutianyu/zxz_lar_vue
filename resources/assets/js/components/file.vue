<template>
    <upload>
        <v-btn
                :loading="loading"
                @click.native="loading = !loading"
                :disabled="loading"
                color="blue-grey"
                dark
        >
            Upload<input type="file">
            <v-icon right dark>cloud_upload</v-icon>
        </v-btn>
    </upload>
</template>

<script>
    import upload from './upload.vue'

    export default {
        components: {
            upload
        },
        data: () => ({
            loader: null,
            loading: false
        })
    }
</script>