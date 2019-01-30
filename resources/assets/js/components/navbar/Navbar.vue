<template>
    <nav class="navbar is-info">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Social
            </a>
            <div class="navbar-burger burger" data-target="navMenuColorinfo-example">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navMenuColorinfo-example" class="navbar-menu">
            <div class="navbar-start">


            </div>

            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">

                    </a>

                    <div class="navbar-dropdown is-right">
                        <a class="navbar-item">
                            Settings
                        </a>
                        <a class="navbar-item">
                            About
                        </a>

                        <hr class="navbar-divider">
                        <a class="navbar-item" @click="logout()">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped>
    .navbar {
        -webkit-box-shadow: 0px 5px 5px 0px rgba(194,194,194,0.57);
        -moz-box-shadow: 0px 5px 5px 0px rgba(194,194,194,0.57);
        box-shadow: 0px 5px 5px 0px rgba(194,194,194,0.57);
    }

    .navbar-brand > .navbar-item {
        font-size: 30px;
        padding: 0 10px;
    }
</style>

<script>
    export default {
        name: 'navbar',
        data() {
            return {
                activeIndex: '1',
                searchString: "",
            };
        },
        methods: {
            search: function () {
                console.log(this.searchString)
            },
            logout: function () {
                localStorage.removeItem('access_token')
                localStorage.removeItem('expires_in', '')
                localStorage.removeItem('token_type', '')

                this.$router.push('/login')
            }
        },
        watch: {
            searchString: function () {
                console.log(this.searchString)
            }
        }
    }
</script>