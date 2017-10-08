<template>
    <Loading></Loading>
</template>

<script>
    import Loading from './loading.vue';
    export default {
        mounted() {
            console.log('Component mounted.');
            alert('created ');
            this.loading = false;
        },
        components: {Loading},

    }
</script>

<style lang="scss">
    .test {
        font-size: 50px;
    }

</style>
