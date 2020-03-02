<template>
    <div :style="{'background-image':'url()'}">
        <h2>Market Place For Textbook</h2>
        <input type="text" name="username" v-model="input.username" placeholder="Username" />
        <input type="password" name="password" v-model="input.password" placeholder="Password" />
        <button type="button" v-on:click="login()">Login</button>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                input: {
                    username: "",
                    password: ""
                }
            }
        },
        methods: {
            login() {
                if(this.input.username == "admin" && this.input.password == "pass") {
                    this.$store.commit("setAuthentication", true);
                    this.$router.replace({ name: "secure" });
                    // Additional logic here...
                } else {
                    console.log("The username and / or password is incorrect");
                }
            }
        }
    }
</script>

<style scoped>
       #login {
        width: 500px;
        border: 1px solid #CCCCCC;
        background-color: #FFFFFF;
        margin: auto;
        margin-top: 200px;
        padding: 20px;
       }   
</style>