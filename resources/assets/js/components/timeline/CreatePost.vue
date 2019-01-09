<template>
    <div id="create-post">
        <el-input placeholder="What's in your mind" v-model="postTxt"></el-input>
    </div>
</template>

<style scoped>
    #create-post {
        margin-bottom: 20px;
        width: 100%;
    }
</style>

<script>
    export default {
        data() {
            return {
                postTxt: ""
            }
        }
    }
</script>