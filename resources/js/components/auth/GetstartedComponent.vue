<template>
    <HeaderComponent/>
    <div class="container paddingBottom-15 authContainer">
        <div class="row" id="getStarted">
            <h1>Get Started</h1>
            <p>Create an account with us to keep track of your transations.</p>
        </div>
        <div class="row" id="getStartedForm">
            <div class="card">
                <div class="card-content">
                    <h2>Sign Up</h2>

                    <div class="getStartedFormWrapper">
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="name">Name</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="name" v-model="user.name" type="text" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="phone" v-model="user.phone" type="tel" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="email" v-model="user.email" type="email" class="browser-default">
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
                            <div class="input-field col l4">
                                <label for="cPassword">Confirm Password</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="cPassword" v-model="user.password_confirmation" type="password" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4"></div>
                            <div class="input-field col l8">
                                <a class="btn marginRight3" @click="registerUser()">
                                    <div class="preloader-wrapper small active" v-if="registrationLoading">
                                        <div class="spinner-layer">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                            <div class="circle"></div>
                                        </div><div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                        </div>
                                    </div>
                                    <span v-else>Sign Up</span>
                                </a>
                                <a href="/auth/signin" class="btn btnBorder">Login</a>
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
                    password_confirmation: "",
                    phone: "",
                    role: 'Client',
                    name: "",
                },
                registrationLoading: false
            };
        },
        props: {},
        mounted() {},
        methods: {
            registerUser(){
                this.registrationLoading = true;
                if(this.user.email != "" && this.user.phone != "" && this.user.password != "" && this.user.password_confirmation != "" && this.user.name != ""){
                    axios
                    .post(`/auth/register`, this.user)
                    .then((res) => {
                        if(res.data.status === 200){
                            M.toast({
                                html: 'Registration Success! Redirecting to login page.',
                                classes: "successNotifier",
                            });
                            
                            setTimeout(function(){
                                window.location.href = "/auth/signin";
                            }, 3000)
                        } else {
                            M.toast({
                                html: res.data.error,
                                classes: "errorNotifier",
                            });
                        }
                        this.registrationLoading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
                } else {
                    M.toast({
                        html: 'Please fill the form properly.',
                        classes: "errorNotifier",
                    });
                    this.registrationLoading = false;
                }
            }
        },
    };
</script>
