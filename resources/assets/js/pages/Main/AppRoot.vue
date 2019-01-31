<template>
    <div>
        <navbar></navbar>
        <div class="container">
            <newpost @reloadPost="onReloadPost"></newpost>
            <div v-for="post in posts">
                <postelement v-bind:post="post.post" v-bind:love="post.love"></postelement>
            </div>
        </div>

    </div>

</template>

<style>
    #app-root {
        height: 100%;
    }

    #content-wrapper {
        top: 50px;
        height: 100%;
    }

    .container {
        margin-top: 30px;
    }

</style>

<script>
    import navbar from '@/components/navbar/Navbar'
    import newpost from './Components/NewPost'
    import postelement from './Components/PostElement'
    import axios from 'axios'

    export default {
        components: {
            navbar,
            newpost,
            postelement
        },
        data() {
            return {
                posts: []
            }
        },
        methods: {
            getPost: function() {
                axios({
                    url: '/api/posts',
                    method: 'get',

                }).then(res => {
                    this.posts = (res.data.data) ? res.data.data : [];
                }).catch(err => {
                    console.log(err.response)
                })

            },
            checkLogin: function () {
                return new Promise(function (resolve, reject) {
                    if (!localStorage.getItem('access_token') || localStorage.getItem('access_token') == '') {
                        this.$router.push('/login')
                    }
                    resolve(true)
                }.bind(this))

            },
            onReloadPost: function (value) {
                if (value) {
                    this.getPost()
                }
            }
        },
        created() {
            this.checkLogin()
                .then(resolve => {
                    this.getPost();
            });

        }
    }
</script>