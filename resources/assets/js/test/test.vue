<template>
    <div class="a" :style="{ width: this.a + 'px'}" >
        <button @click="check()" class="btn">

        </button>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                a: 100
            }
        },
        mounted() {
          window.onresize = () => {
              this.a =  (window.innerWidth - 500);
          }
        },
        methods: {
            check() {
                this.a += 1;
                console.log(this.a);
            }
        }
    }
</script>

<style lang="scss">
    @import "../style/mixin";
    .a {
        @include wh(100px, 100px);
        background-color: black;
    }
    .btn {
        @include wh(50px, 50px);
        background-color: cyan;
    }
</style>