<template>
    <HeaderComponent/>
    <div class="container paddingBottom-15 paddingTop-15 authContainer">
        <div class="row" id="forgotPassForm">
            <div class="card">
                <div class="card-content" v-if="viewState == 1">
                    <h2>Forgot Password?</h2>
                    <div class="row">
                        <p>Dont worry, we got you! State: {{x}}</p>
                    </div>

                    <div class="forgotPassFormWrapper">
                        <div class="row">
                            <div class="input-field col l12 noMarginBottom noPaddingLeft">
                                <label for="emailPhone">Email/Phone</label>
                            </div>
                            <div class="input-field col l12 noPaddingLeft">
                                <input id="emailPhone" v-model="emailPhone" type="text" class="browser-default">
                            </div>
                        </div>                        
                        
                        <div class="row">
                            <a class="col l12 btn" @click="showFpasModal()">Next</a>
                        </div>
                    </div>
                </div>

                <div class="card-content" v-else>
                    <h2>Reset Passwords</h2>
                    <div class="row">
                        <p>You can now reset your password</p>
                    </div>

                    <div class="forgotPassFormWrapper">
                        <div class="row">
                            <div class="input-field col l4 noPaddingLeft">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="password" v-model="pass" type="password" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4 noPaddingLeft">
                                <label for="cPassword">Confirm Password</label>
                            </div>
                            <div class="input-field col l8">
                                <input id="cPassword" v-model="cPass" type="password" class="browser-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l4"></div>
                            <div class="input-field col l8">
                                <!--button class="btn col l12 modal-trigger" href="#fPassmodal">Save</button-->
                                <a class="col l12 btn" @click="showFpasModal()">
                                    <div class="preloader-wrapper small active" v-if="passResetLoading">
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
                                    <span v-else>Reset Password</span>
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="fPassmodal" class="modal">
        <div class="modal-content center-align">
            <div class="row" v-if="viewState == 1">
                <i class="material-icons primaryIcon medium slantIcon">send</i>
                <p>
                    Verification link has been sent to the email provided
                </p>

                <button @click="changeState(2)" class="btn col l12 modal-close ">Got it!</button>
            </div>       
            <div class="row" v-else>
                <i class="material-icons primaryIcon medium">check_circle</i>
                <p>
                    Password reset successfully
                </p>

                <a href="/auth/signin" class="btn col l12">Proceed to Sign in</a>
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
        props: {},
        data() {
            return {
                viewState: 1,
                emailPhone: '',
                pass: "",
                cPass: "",
                passResetLoading: false
            };
        },
        mounted() {},
        methods: {
            changeState(num){

                this.viewState = num;
            },
            showFpasModal(){
                let err = 0;
                if(this.viewState == 1){
                    if(this.emailPhone == ""){
                        M.toast({
                            html: 'Please enter your phone number or email address.',
                            classes: "errorNotifier",
                        });

                        err = 1;
                    } 
                } else {
                    if(this.pass == "" || this.pass != this.cPass){
                        M.toast({
                            html: 'Please enter matching passwords',
                            classes: "errorNotifier",
                        });

                        err = 1;
                    } else {
                        this.passResetLoading = true;
                        err = 1;
                    }
                }

                // no errors
                if(err == 0){
                    let elem = document.getElementById("fPassmodal"); 
                    let instance = M.Modal.getInstance(elem);
                    instance.open();
                }
            }
        },
    };
</script>
