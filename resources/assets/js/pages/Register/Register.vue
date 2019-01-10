<template>
    <div id="register-wrapper">
        <div class="block">
            <div class="logo">
                <h3>Social</h3>
            </div>
            <div class="form">
                <div class="input-wrapper mb-10">
                    <el-input v-model="email" placeholder="Email"></el-input>
                </div>
                <div class="input-wrapper mb-10">
                    <el-input v-model="password" type="password" placeholder="Password"></el-input>
                </div>
                <div class="input-wrapper">
                    <el-input v-model="passwordConfirm" type="password" placeholder="Confirm Password"></el-input>
                </div>
            </div>
            <hr>
            <div class="button-group">
                <el-button type="primary" round plain>Register</el-button>
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
        width: 80%;
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
        font-weight: 600;
        border: 0;
        width: 100%;
        max-width: 300px;
    }
</style>


<script>
    export default {
        data() {
            return {
                email: "",
                password: "",
                passwordConfirm: ""
            }
        }
    }
</script>