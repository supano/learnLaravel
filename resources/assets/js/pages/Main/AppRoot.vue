<template>
    <div>
        <navbar></navbar>
        <div class="container">
            <newpost></newpost>
            <div v-for="post in posts">
                <h2>{{post.title}}</h2>
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
    import navbar from '@/components/navbar/Navbar.vue'
    import newpost from './Components/NewPost'
    import axios from 'axios'

    export default {
        components: {
            navbar,
            newpost
        },
        data() {
            return {
                posts: []
            }
        },
        methods: {
            getPost: function() {
                axios({
                    url: '/api/articles',
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