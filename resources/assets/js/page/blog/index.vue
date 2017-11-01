<template>
    <div class="m-blog">
        <vheader></vheader>
        <router-view name="fade"></router-view>
        <vfooter></vfooter>
    </div>
</template>

<script>
    import vfooter from '../../components/footer/footer.vue'
    import vheader from '../../components/header/header.vue'

    export default {
        components: {
            vfooter,
            vheader
        },
        data() {
            return {

            }
        },

    }
</script>

<style lang="scss" scoped>
    .m-blog {
        background-color: #27BBF5;
    }

</style>