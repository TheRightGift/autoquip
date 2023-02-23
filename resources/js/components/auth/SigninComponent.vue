<template>
    <HeaderComponent/>
    <div class="container paddingBottom-15">
        <div class="row" id="signIn">
            <h1>Welcome Back</h1>
            <p>Create an account with us to keep track of your transations.</p>
        </div>
        <div class="row" id="signInForm">
            <div class="card">
                <div class="card-content">
                    <h2>Sign In</h2>

                    <div class="signInFormWrapper">
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="emailPhone">Email/Phone</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="emailPhone" v-model="user.email" type="text" class="browser-default">
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="password" v-model="user.password" type="password" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4"></div>
                            <div class="input-field col l8">
                                <div class="col l6">
                                    <label>
                                        <input type="checkbox" />
                                        <span class="formText">Remember me</span>
                                    </label>
                                </div>
                                <div class="col l6 right-align">
                                    <a href="/auth/forgotpassword" class="formText">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4"></div>
                            <div class="input-field col l8 center-align">
                                <button class="btn col l12" @click="loginUser()">Sign in</button>
                                <p class="formText">Don't have an account? <a href="/auth/getstarted">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import HeaderComponent from "../partials/HeaderComponent.vue";
    export default {
        components: {
            HeaderComponent,
        },
        data() {
            return {
                user: {
                    email: "",
                    password: "",
                },
                loginLoading: false
            };
        },
        props: {},
        mounted() {},
        methods: {
            loginUser(){
                this.loginLoading = true;
                if(this.user.email != "" && this.user.password != ""){
                    axios
                    .post(`/auth/login`, this.user)
                    .then((res) => {
                        if(res.data.status === 200){
                            M.toast({
                                html: 'Success!',
                                classes: "successNotifier",
                            });
                            
                            // setTimeout(function(){
                            window.location.href = "/dashboard";
                            // }, 5000)
                        } else {
                            M.toast({
                                html: res.data.error,
                                classes: "errorNotifier",
                            });
                        }
                        this.loginLoading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
                } else {
                    M.toast({
                        html: 'Please fill the form properly.',
                        classes: "errorNotifier",
                    });
                    this.loginLoading = false;
                }
            }
        },
    };
</script>
