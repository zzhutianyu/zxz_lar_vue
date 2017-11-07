<template>
    <v-btn
            color="blue-grey"
            darkr
            @click="loading = !loading"
            :loading="loading"
    >
        Upload
        <label for="file" class="m-label">
            <input type="file" id="file" @change="test">

        </label>
        <v-icon right dark>cloud_upload</v-icon>
    </v-btn>
</template>

<script>
    export default {
        data: () => ({
            loader: null,
            loading: false
        }),
        methods: {
            test(e) {
                let file = e.target.files[0];
                console.log(file);
            }
        }
    }
</script>

<style lang="scss" scoped>
    input[type="file"] {
        display: none;
    }

    .m-label {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

</style>