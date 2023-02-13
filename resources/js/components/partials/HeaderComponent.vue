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
                <li><a href="#">Login</a></li>
                <li><a href="#" class="waves-effect waves-light btn">Sign Up</a></li>
            </ul>
        </div>
    </nav>
</template>
<script>    
    export default {
        props: {
            // type: String,
        },
        data() {
            return {};
        },
        props: {},
        data() {
            return {};
        },
        mounted() {
            console.log(this.type)
        },
        methods: {},
    };
</script>