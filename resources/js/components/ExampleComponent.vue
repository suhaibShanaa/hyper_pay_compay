<template>
    <div class="container">
        <div class="row justify-content-center mb-3" ref="imageUpload">

            <div class="col-12 bg-info text-white rounded py-3 my-2 text-center">DRP IMAGE(S) HERE</div>

        </div>
    </div>
</template>

<script>

    import Dropzone from 'dropzone';
    export default {

        data:function() {
            return {
                dropzone: null
            }
        },
        mounted() {
            this.dropzone = new  Dropzone(this.$refs.imageUpload , {
                url: '/api/product/index'
            });
        }
    }
</script>
