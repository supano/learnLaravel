<template>
    <div id="register-wrapper">
        <div class="block">
            <div class="logo">
                <h3>Social</h3>
            </div>
            <div class="form">
                <div class="input-wrapper mb-10">
                    <input type="email" class="input" placeholder="Email" v-model="email" id="email">
                    {{ emailErrorMsg }}
                </div>
                <div class="input-wrapper mb-10">
                    <input type="password" class="input" placeholder="Password" v-model="password" id="password">
                </div>
                <div class="input-wrapper">
                    <input type="password" class="input" placeholder="Confirm Password"
                        v-model="passwordConfirm"
                        v-bind:class="{ 'is-danger' : !isPasswordValid }"
                        id="passwordConfirm">

                </div>
                <p style="color:red;min-height: 14px;margin-top: 20px">
                    {{ errorMsg }}
                </p>

            </div>
            <hr>
            <div class="button-group">
                <button class="button is-rounded" @click="register()">Register</button>
            </div>
        </div>
    </div>
</template>

<style scoped>

    #register-wrapper {
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
        max-height: 500px;
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
        height: 30%;
        border-radius: 3px 3px 0 0;
    }

    .form {
        height: 50%;
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
        background-image: linear-gradient(45deg, #a1c4fd 0%, #c2e9fb 100%);
        color: white;
        font-weight: 400;
        border: 0;
        width: 100%;
        max-width: 300px;
    }
</style>


<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                email: null,
                password: null,
                passwordConfirm: null,
                isPasswordValid: true,
                hasError: true,
                emailErrorMsg: null,
                errorMsg: null
            }
        },
        watch: {
            password: function () {
                if (this.password != null && this.passwordConfirm != null) {
                    if (this.password === this.passwordConfirm)  {
                        this.isPasswordValid = true
                        this.errorMsg = ""

                    } else {
                        this.isPasswordValid = false
                        this.errorMsg = "Password and Confirm Password Not Match!"
                    }
                }
            },
            passwordConfirm: function () {
                if (this.password != null && this.passwordConfirm != null) {
                    if (this.password === this.passwordConfirm)  {
                        this.isPasswordValid = true
                        this.errorMsg = ""

                    } else {
                        this.isPasswordValid = false
                        this.errorMsg = "Password and Confirm Password Not Match!"

                    }
                }
            }
        },
        methods: {
            register: function () {

                if (this.isFormValid() && this.isPasswordValid) {

                    axios({
                        url: '/api/auth/register',
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
                        this.$router.push('/login')
                    }).catch(err => {
                        let res = err.response
                        let _errorMsg = ""
                        console.log(res.data.errors)
                        for (let key in res.data.errors) {
                            _errorMsg = _errorMsg + res.data.errors[key] + "\n"
                        }

                        this.errorMsg = _errorMsg
                    })
                }

            },
            isFormValid: function () {
                let errorCount = 0;
                (this.isInputNull("email")) ? errorCount++ : null;
                (this.isInputNull("password")) ? errorCount++ : null;
                (this.isInputNull("passwordConfirm")) ? errorCount++ : null;

                if (errorCount > 0){
                    return false
                } else {
                    return true
                }
            },
            isInputNull: function (id) {
                if (document.getElementById(id).value == null || document.getElementById(id).value == "") {
                    document.getElementById(id).classList.add("is-danger")
                    return true
                } else {
                    document.getElementById(id).classList.remove("is-danger")
                    return false
                }
            }
        }
    }
</script>