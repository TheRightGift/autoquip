<template>
    <div class="row">
        <AdminDashHeaderComponent  @navChanged="selectNavView"></AdminDashHeaderComponent>
        <div class="col l10 dashContainer" v-if="viewState === 0">
            <div class="row dashTitle">
                <p>Admin Dashboard</p>
            </div>
            <div class="row statBoxes">
                <div class="col l3 usersBox box">
                    <div>
                        <i class="material-icons large">people</i>
                    </div>
                    <div class="boxDet">
                        <span class="stats">0</span>
                        <span>Users</span>
                    </div>
                </div>
                <div class="col l3 ordersBox box">
                    <div>
                        <i class="material-icons large">shopping_cart</i>
                    </div>
                    <div class="boxDet">
                        <span class="stats">0</span>
                        <span>Orders</span>
                    </div>
                </div>
                <div class="col l3 enquiriesBox box">
                    <div>
                        <i class="material-icons large">forum</i>
                    </div>
                    <div class="boxDet">
                        <span class="stats">0</span>
                        <span>Enquiries</span>
                    </div>
                </div>
                <div class="col l3 productsBox box">
                    <div>
                        <i class="material-icons large">shopping_basket</i>
                    </div>
                    <div class="boxDet">
                        <span class="stats">0</span>
                        <span>Products</span>
                    </div>
                </div>
            </div>
            <div class="row recentOrders marginTop-10">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="7">Recent Orders</th>
                        </tr>
                        <tr class="subHeader">
                            <th class="center-align">Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Product Info</th>
                            <th>Order Info</th>
                            <th>Status</th>
                            <th class="paddingRight-2">Last seen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td  class="center-align" colspan="7">No orders yet!</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <div class="row recentEnquires marginTop-10">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="2">Enquiries</th>
                            <th class="right-align">
                                <a href="" class="btn">
                                    View All
                                </a>
                            </th>
                        </tr>
                        <tr class="subHeader">
                            <th class="center-align">Name/Email</th>
                            <th>Message</th>
                            <th  class="right-align paddingRight-3">Date sent</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td  class="center-align" colspan="3">No enquiries yet!</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="row dashAnalytics marginTop-10">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="2">Analytics</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="col l10 dashContainer" v-if="viewState === 1">
            <div class="row dashTitle">
                <p>Admin Dashboard</p>
            </div>
            <div class="row dashTable marginTop-10">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="3">
                                Enquiries
                            </th>
                        </tr>
                        <tr class="subHeader">
                            <th  class="paddingLeft-2 center-align">Name/Email</th>
                            <th>Message</th>
                            <th class="right-align paddingRight-2">Date Sent</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td  class="center-align" colspan="7">No Enquiry yet!</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col l10 dashContainer" v-if="viewState === 2">
            <div class="row dashTitle">
                <p>Admin Dashboard</p>
            </div>
            <div class="row dashTable marginTop-10">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="5">
                                Users
                                <input type="text" v-model="userSearch" class="browser-default right" placeholder="Search User"/>
                            </th>
                        </tr>
                        <tr class="subHeader">
                            <th  class="paddingLeft-2 center-align percent20">Name</th>
                            <th class="percent20">Email</th>
                            <th class="percent16_6">Phone No</th>
                            <th class="percent16_6">Date Registered</th>
                            <th class="paddingRight-2 percent16_6">Last seen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td  class="center-align" colspan="7">No user yet!</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col l10 dashContainer" v-if="viewState === 3">
            <div class="row dashTitle">
                <p>Admin Dashboard</p>
            </div>
            <div class="row dashTable marginTop-10">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="5">
                                All Orders
                            </th>
                        </tr>
                        <tr class="subHeader">
                            <th  class="paddingLeft-2 center-align">Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Product Info</th>
                            <th>Order Info</th>
                            <th>Status</th>
                            <th class="paddingRight-2">Last seen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td  class="center-align" colspan="7">No order yet!</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col l10 dashContainer" v-if="viewState === 4">
            <div class="row dashTitle">
                <p>Admin Dashboard</p>
            </div>
            <div class="row dashTable marginTop-10">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="7">
                                Product List
                            </th>
                        </tr>
                        <tr class="subHeader">
                            <th class="paddingLeft-2">S/N</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Product Info</th>
                            <th>Product ID</th>
                            <th>Price</th>
                            <th class="paddingRight-2">Date Updated</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td  class="center-align" colspan="7">No order yet!</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import AdminDashHeaderComponent from "../partials/AdminDashHeaderComponent.vue";
    export default {
        components: {
            AdminDashHeaderComponent,
        },
        data() {
            return {
                viewState: 0
            };
        },
        props: {},
        mounted() {},
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
            selectNavView(value){
                this.viewState = value;
            }
        },
    };
</script>
