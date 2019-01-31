<template>
    <div>
        <textarea class="textarea" placeholder="What's in your mind" v-model="postText" ></textarea>
        <a class="button is-primary" @click="createPost()">Post</a>

    </div>
</template>

<style scoped>
    .button {
        margin-top: 10px;
    }
</style>


<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                postText: ''
            }
        },
        methods: {
            createPost: function () {

                axios({
                    url: '/api/posts',
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    data: {
                        'user_id': 0,
                        'post': this.postText
                    }
                }).then(res => {
                    console.log(res)
                    this.postText = ""
                    this.$emit('reloadPost',true)
                }).catch(err => {
                    console.log(err.response)
                })
            }
        },
        created() {
        }
    }
</script>