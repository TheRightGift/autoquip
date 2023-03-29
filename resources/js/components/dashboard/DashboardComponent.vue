<template>
    <div class="row">
        <AdminDashHeaderComponent  @navChanged="selectNavView" userType="client"></AdminDashHeaderComponent>
        <div class="col l10 dashContainer" v-if="viewState === 0">
            <div class="row dashTitle">
                <p>Customer Dashboard > User Profile</p>
            </div>
            <div class="row marginTop-10">
                <h5>Hello <span v-if="user !== null">{{user.name.split(" ")[0]}}</span>,</h5>
                <p class="tertiacryText">
                    You can create, manage and change your account information.
                </p>
            </div>
            <div class="row dashTable marginTop-5">
                <table>
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="2">
                                Account Information
                            </th>
                        </tr>
                    </thead>

                    <tbody class="userProfileTable">
                        <tr>
                            <td class="tableDataPadding">
                                <div class="col l12 profileHead">
                                    <span>Name</span>
                                    <a @click="switchEditMode('name')" href="#">
                                        <i class="material-icons right" v-if="editMode == 'name'">visibility</i>
                                        <i class="material-icons right" v-else>mode_edit</i>
                                    </a>
                                </div>
                                <div class="col l12" v-if="editMode == 'name'">
                                    <input v-model="user.name" type="text"/>
                                </div>
                                <div class="col l12" v-else>
                                    <span v-if="user !== null">{{user.name}}</span>
                                </div>
                            </td>

                            <td class="tableDataPadding">
                                <div class="col l12 profileHead">
                                    <span>Email</span>
                                    <a @click="switchEditMode('email')" href="#">
                                        <i class="material-icons right" v-if="editMode == 'email'">visibility</i>
                                        <i class="material-icons right" v-else>mode_edit</i>
                                    </a>
                                </div>
                                <div class="col l12" v-if="editMode == 'email'">
                                    <input v-model="user.email" type="text"/>
                                </div>
                                <div class="col l12" v-else>
                                    <span v-if="user !== null">{{user.email}}</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tableDataPadding">
                                <div class="col l12 profileHead">
                                    <span>Phone Number</span>
                                    <a @click="switchEditMode('phone')" href="#">
                                        <i class="material-icons right" v-if="editMode == 'phone'">visibility</i>
                                        <i class="material-icons right" v-else>mode_edit</i>
                                    </a>
                                </div>
                                <div class="col l12" v-if="editMode == 'phone'">
                                    <input v-model="user.phone" type="text"/>
                                </div>
                                <div class="col l12" v-else>
                                    <span v-if="user !== null">{{user.phone}}</span>
                                </div>
                            </td>

                            <td class="tableDataPadding">
                                <div class="col l12 profileHead">
                                    <span>Address</span>
                                    <a @click="switchEditMode('address')" href="#">
                                        <i class="material-icons right" v-if="editMode == 'address'">visibility</i>
                                        <i class="material-icons right" v-else>mode_edit</i>
                                    </a>
                                </div>
                                <div class="col l12" v-if="editMode == 'address'">
                                    <input v-model="user.address" type="text"/>
                                </div>
                                <div class="col l12" v-else>
                                    <span v-if="user !== null && user.address">{{user.address}}</span>
                                    <small v-else>No address</small>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td class="tableDataPadding">
                                <div class="col l12 profileHead">
                                    <span>Shipping Address</span>
                                    <a @click="switchEditMode('shippingAddress')" href="#">
                                        <i class="material-icons right" v-if="editMode == 'shippingAddress'">visibility</i>
                                        <i class="material-icons right" v-else>mode_edit</i>
                                    </a>
                                </div>
                                <div class="col l12" v-if="editMode == 'shippingAddress'">
                                    <input v-model="user.shippingAddress" type="text"/>
                                </div>
                                <div class="col l12" v-else>
                                    <span v-if="user !== null && user.shippingAddress">{{user.shippingAddress}}</span>
                                    <small v-else>No shipping address</small>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col l12 center-align">
                    <a @click="editUserProfile()" class="btn">Edit Profile</a>
                </div>
            </div>
        </div>

        <div class="col l10 dashContainer" v-if="viewState === 2">
            <div class="row dashTitle">
                <p>Customer Dashboard > User Profile</p>
            </div>
            
            <div class="row dashTable marginTop-10">
                <table class="col l8">
                    <thead>
                        <tr class="mainHeader">
                            <th colspan="5">
                                Cart
                            </th>
                        </tr>
                        <tr class="subHeader">
                            <th class="paddingLeft-2">S/N</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th class="right-align paddingRight-2"></th>
                        </tr>
                    </thead>

                    <tbody class="cartItemsTable">
                        <tr v-if="loadingCartView">
                            <td colspan="5">
                                <div class="progress">
                                    <div class="indeterminate"></div>
                                </div>
                            </td>
                        </tr>
                        <tr v-else v-for="(item, index) in cartItems">
                            <td class="paddingLeft-2">
                                <input type="checkbox" :value="index" @change="checkOut"/>
                                {{index + 1}}
                            </td>
                            <td class="productDet">
                                <img :src="item.product.images[0].url" class=""/>
                                {{item.product.title}}
                            </td>
                            <td>{{item.unitPrice}}</td>
                            <td>
                                <input type="number" v-model="item.qty" class="browser-default"/>
                            </td>
                            <td>
                                {{item.unitPrice * item.qty}}
                            </td>
                            <td>
                                <a href="#!" class="black-text" @click="removeCartItem(index, item.id)">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <tr class="row">
                            <td colspan="3">
                                <a href="#!">Continue Shopping</a>
                            </td>
                            <td colspan="3">
                                <a class="btn right">Checkout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="col l4">

                </div>
            </div>

        
        </div>
    </div>

    <!--Add product Modal-->
    <!--div id="editProfileModal" class="modal">
        <div class="modal-content center-align">
            <div class="row">
                <h4>Edit {{editMode}}</h4>
            </div>
            <div class="row">
                <div class="col l6">
                    <div v-if="editMode === 'name'">
                        <input v-model="user.name" type="text" class="browser-default">
                    </div>
                </div>
            </div>            
        </div>
    </div-->
</template>

<script>
    import AdminDashHeaderComponent from "../partials/AdminDashHeaderComponent.vue";
    export default {
        components: {
            AdminDashHeaderComponent,
        },
        data() {
            return {
                viewState: 0,
                user: null,
                editMode: '',
                loadingCartView: false,
                cartItems: null,
                checkoutBox: []
            };
        },
        props: {},
        mounted() {
            this.getUserDetails()
        },
        methods: {
            removeCartItem(index, id){
                axios
                .delete("/api/carts/"+id)
                .then((res) => {
                    if(res.data.status == 204){
                        this.cartItems.splice(index, 1)
                    }                   
                })
                .catch((err) => {
                    console.log(err);
                    this.loadingCartView = false;
                });
            },
            checkOut(e){
                
                if(e.target.checked == true){
                    this.checkoutBox.push(this.cartItems[e.target.value]);
                    console.log(this.checkoutBox)
                }
            },
            selectNavView(value){
                this.viewState = value;
                
                if(value == 2){
                    this.getMyCartItems();
                }   
            },
            getMyCartItems(){
                this.loadingCartView = true;
                axios
                .get("/api/userCartItems/"+this.user.id)
                .then((res) => {
                    if(res.data.status === 200){
                        this.cartItems = res.data.cartItems;
                        console.log(this.cartItems)
                    }
                    this.loadingCartView = false;                    
                })
                .catch((err) => {
                    console.log(err);
                    this.loadingCartView = false;
                });
            },
            getUserDetails(){
                // userDetails
                axios
                .get("/userDetails")
                .then((res) => {
                    this.user = res.data;
                    console.log(res.data)
                })
                .catch((err) => {
                    console.log(err);
                });
            },
            editUserProfile(){
                axios
                .patch(
                    `api/users/${this.user.id}`, this.user
                )
                .then((res) => {
                    if(res.data.status === 200){
                        this.user = res.data.user;
                        this.editMode = '';

                        M.toast({
                            html: res.data.message,
                            classes: "successNotifier",
                        });
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
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
            switchEditMode(mode){
                if(this.editMode === mode){
                    this.editMode = '';
                } else {
                    this.editMode = mode;
                }
            }
        },
    };
</script>
