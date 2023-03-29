<template>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">Autoquip, LLC</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="#">Enquiry</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="#">Support</a></li>
                <li>
                    <a href="#">
                        <i class="material-icons primaryIcon">shopping_cart</i>
                        <span class="notify" v-if="cartItemsLen > 0">{{cartItemsLen}}</span>
                    </a>
                </li>
                <span v-if="user != null">
                    <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-trigger" href="#!" @click="showDropDown()">{{user.name}}<i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                </span>
                <span v-else>
                    <li><a href="/auth/signin">Login</a></li>
                    <li><a href="/auth/getstarted" class="waves-effect waves-light btn">Sign Up</a></li>
                </span>
            </ul>
        </div>
    </nav>
    <!-- Dropdown Structure -->
    <ul class="dropdownContainer" v-if="user != null && showDropDownState">
        <li><a href="/dashboard"><i class="material-icons">tune</i>Dashboard</a></li>
        <li class="divider"></li>
        <li><a @click="logout()" href="#!"><i class="material-icons">exit_to_app</i>Logout</a></li>
    </ul>
</template>
<script>    
    export default {
        props: {
            // type: String,
        },
        props: ['cartItemsNum'],
        watch: { 
            cartItemsNum: function(newVal, oldVal) { // watch it
                this.cartItemsLen += 1;
            }
        },
        data() {
            return {
                userLoggedIn: false,
                user: null,
                instance: null,
                showDropDownState: false,
                cartItemsLen: 0
            };
        },
        mounted() {
            this.getUserDetails();
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
            showDropDown(){
                this.showDropDownState = !this.showDropDownState;
            },
            getUserUnpaidCartItems(){
                axios
                .get(`/api/userUnpaidCartItems/${this.user.id}`)
                .then((res) => {
                    if(res.data.cartItems.length > 0){
                        this.cartItemsLen = res.data.cartItems.length;
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            },
            getUserDetails(){
                // userDetails
                axios
                .get("/userDetails")
                .then((res) => {
                    if(typeof res.data === 'object'){
                        this.user = res.data;

                        this.getUserUnpaidCartItems();
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            },
        },
    };
</script>