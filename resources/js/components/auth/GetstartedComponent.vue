<template>
    <HeaderComponent/>
    <div class="container paddingBottom-15">
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
                                <input id="name" type="text" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="phone" type="tel" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="email" type="email" class="browser-default">
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
                            <div class="input-field col l4">
                                <label for="cPassword">Confirm Password</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="cPassword" type="password" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4"></div>
                            <div class="input-field col l8">
                                <a href="" class="btn marginRight3">Save</a>
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
