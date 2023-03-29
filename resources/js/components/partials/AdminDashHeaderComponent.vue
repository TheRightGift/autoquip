<template>    
    <div class="col l2" id="dashSideNav">
        <div class="col l12 center-align">
            <a href="/" class="brand">Autoquip, LLC</a>
        </div>

        <div class="col l12 nav" v-if="userType === 'admin'">
            <ul>
                <li :class="navState == 0 ? 'active' : null">
                    <a @click="changeNav(0)">
                        <i class="material-icons">assessment</i>
                        <span class="navTitle">Dasboard</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 1 ? 'active' : null">
                    <a @click="changeNav(1)">
                        <i class="material-icons">forum</i>
                        <span class="navTitle">Enquiries</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 2 ? 'active' : null">
                    <a @click="changeNav(2)">
                        <i class="material-icons">people</i>
                        <span class="navTitle">Users</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 3 ? 'active' : null">
                    <a @click="changeNav(3)">
                        <i class="material-icons">shopping_cart</i>
                        <span class="navTitle">Orders</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 4 ? 'active' : null">
                    <a @click="changeNav(4)">
                        <i class="material-icons">shopping_basket</i>
                        <span class="navTitle">Products</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 5 ? 'active' : null">
                    <a @click="changeNav(5)">
                        <i class="material-icons">show_chart</i>
                        <span class="navTitle">Analysis</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col l12 nav" v-if="userType === 'client'">
            <ul>
                <li :class="navState == 0 ? 'active' : null">
                    <a @click="changeNav(0)">
                        <i class="material-icons">assessment</i>
                        <span class="navTitle">Profile</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 1 ? 'active' : null">
                    <a @click="changeNav(1)">
                        <i class="material-icons">forum</i>
                        <span class="navTitle">History</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 2 ? 'active' : null">
                    <a @click="changeNav(2)">
                        <i class="material-icons">shopping_cart</i>
                        <span class="navTitle">Cart</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li :class="navState == 4 ? 'active' : null">
                    <a @click="changeNav(4)">
                        <i class="material-icons">forum</i>
                        <span class="navTitle">Enquiries</span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col l12 logout">
            <a @click="logout()" class="red-text pointer">
                <i class="material-icons">exit_to_app</i>
                <span class="navTitle">Logout</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                navState: 0
            };
        },
        props: {
            userType: String,
        },
        mounted() {},
        methods: {
            changeNav(num) {
                this.navState = num;
                this.$emit('navChanged', num);
            },
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
        },
    };
</script>
