<template>
    <div id="login-wrapper">
        <div class="block">
            <div class="logo">
                <h3>Social</h3>
            </div>
            <div class="form">
                <div class="input-wrapper mb-10 mt-30">
                    <input type="email" class="input" placeholder="Email" v-model="email" id="email">
                </div>
                <div class="input-wrapper">
                    <input type="password" class="input" placeholder="Password" v-model="password" id="password">

                </div>
                <p id="error-wrapper">
                    {{ errorMsg }}
                </p>
            </div>
            <hr>
            <div class="button-group">
                <button class="button is-rounded" @click="goToRegister()"><span>Register</span></button>
                <button class="button is-rounded" @click="login()"><span>Login</span></button>
            </div>
        </div>
    </div>
</template>

<style scoped>

    #login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        background-image: linear-gradient(45deg, #a1c4fd 0%, #c2e9fb 100%);
    }

    .block {

        border-radius: 3px;
        background-color: white;
        width: 100%;
        max-width: 500px;
        height: 100%;
        max-height: 400px;
        position: fixed;
        top: 50%;
        left: 50%;
        /* bring your own prefixes */
        transform: translate(-50%, -50%);
        box-shadow: 0 2px 12px 0 rgba(0,0,0,.1);
    }

    .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 60px;
        color: white;
        background-color: #8ec5fc;
        font-weight: 300;
    }

    h3::first-letter {
        font-weight: 800;
    }

    hr {
        border: .5px solid #ebebeb;
        margin: 0;
    }

    .logo {
        height: 40%;
        border-radius: 3px 3px 0 0;
    }

    .form {
        height: 40%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .mb-10 {
        margin-bottom: 10px;
    }

    .input-wrapper {
        padding: 0 50px;
        width: 100%;
    }

    .button-group {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        height: 20%;
    }

    .button-group > button {
        min-width: 150px;
    }

    .button-group > button:nth-child(1) {
        font-weight: 200;
    }

    .button-group > button:nth-child(2) {
        background-image: linear-gradient(45deg, #a1c4fd 0%, #c2e9fb 100%);
        color: white;
        font-weight: 600;
        border: none;
        padding: 13px 24px;
    }

    #error-wrapper {
        color:red;
        min-height: 14px;
        margin-top: 20px;
        margin-bottom: 5px;
    }

    .button {
        display: inline-block;
        line-height: 1;
        white-space: nowrap;
        cursor: pointer;
        background: #fff;
        border: 1px solid #dcdfe6;
        color: #606266;
        -webkit-appearance: none;
        text-align: center;
        box-sizing: border-box;
        outline: none;
        margin: 0;
        transition: .1s;
        font-weight: 500;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        padding: 12px 20px;
        font-size: 14px;
        border-radius: 4px;
        height: auto;
    }
</style>

<script>
    import axios from 'axios'

    const UNAUTHORIZED = 401
    export default {
        data() {
            return {
                email: "",
                password: "",
                errorMsg: ""
            }
        },
        methods: {
            goToRegister: function (){
                this.$router.push("/register")
            },
            login: function () {

                if (this.isFormValid()) {
                    axios({
                        url: '/api/auth/login',
                        method: 'post',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        data: {
                            'email': this.email,
                            'password': this.password
                        }
                    }).then(res => {
                        console.log("suc", res)
                        this.errorMsg = ""

                        for (let key in res.data) {
                            localStorage.setItem(key, res.data[key])
                        }

                        this.$router.push('/')
                    }).catch(err => {
                        let res = err.response
                        if (res.status == UNAUTHORIZED) {
                            this.errorMsg = "Email or Password Not Correct"
                        }
                    })

                }

            },
            isFormValid: function () {
                let errorCount = 0;

                if (document.getElementById("email").value == null || document.getElementById("email").value == "") {
                    document.getElementById("email").classList.add("is-danger")
                    errorCount++
                } else {
                    document.getElementById("email").classList.remove("is-danger")
                }
                if(document.getElementById("password").value == null || document.getElementById("email").value == "") {
                    document.getElementById("password").classList.add("is-danger")
                    errorCount++
                } else {
                    document.getElementById("password").classList.remove("is-danger")
                }

                if (errorCount > 0) {
                    return false
                } else {
                    return true
                }
            }
        }
    }
</script>