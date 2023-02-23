<template>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Autoquip, LLC</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="#">Enquiry</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#"><i class="material-icons primaryIcon">shopping_cart</i></a></li>
                <span v-if="userLoggedIn">
                    <li><a @click="logout()" class="waves-effect waves-light btn">Logout</a></li>
                </span>
                <span v-else>
                    <li><a href="/auth/signin">Login</a></li>
                    <li><a href="/auth/getstarted" class="waves-effect waves-light btn">Sign Up</a></li>
                </span>
            </ul>
        </div>
    </nav>
</template>
<script>    
    export default {
        props: {
            // type: String,
        },
        props: {},
        data() {
            return {
                userLoggedIn: false
            };
        },
        mounted() {
            this.loggedInUser();
        },
        methods: {
            logout(){
                axios
                .post(`/auth/logout`)
                .then((res) => {
                    if(res.data.status === 401){
                        window.location.href = "/";
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            },
            loggedInUser(){
                axios
                .get(`/isLoggedIn`)
                .then((res) => {
                    console.log(res.data)
                    this.userLoggedIn = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
            }
        },
    };
</script>