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
                                <input id="emailPhone" type="text" class="browser-default">
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="password" type="password" class="browser-default">
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
                                <button class="btn col l12">Sign in</button>
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
            return {};
        },
        props: {},
        data() {
            return {};
        },
        mounted() {},
        methods: {},
    };
</script>
