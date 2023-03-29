<template>
    <div class="row">
        <AdminDashHeaderComponent  @navChanged="selectNavView" userType="admin"></AdminDashHeaderComponent>
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
                                <a class="btn right modal-trigger" href="#addProductModal">Add Product</a>
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
    <!--Add product Modal-->
    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4>Add product</h4>
            </div>
            <div class="row">
                <div class="input-field col l6">
                    <label for="name">Product Name</label>
                    <input id="name" v-model="product.name" type="text" class="browser-default">
                </div>
                <div class="input-field col l6">
                    <label for="info">Product Info</label>
                    <input id="info" v-model="product.info" type="text" class="browser-default">
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6">
                    <label for="id">Product ID</label>
                    <input id="id" v-model="product.productId" type="text" class="browser-default">
                </div>
                <div class="input-field col l6">
                    <label for="model">Product Model</label>
                    <input id="model" v-model="product.model" type="text" class="browser-default">
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6">
                    <label for="price">Product Price</label>
                    <input id="price" v-model="product.price" type="number" class="browser-default">
                </div>
                <div class="input-field col l6">
                    <label>Product Image</label>
                    <!--input class="file-path validate" type="text"-->

                    <label class="custom-file-upload">
                        <input type="file" multiple accept=".png, .jpg" @change="imgUpload"/>
                        <i class="material-icons" v-if="product.imageUrl == null">photo</i>
                        <span v-else>{{product.imageUrl.length}} Images</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <a @click="addProduct()" class="btn">
                        <div class="preloader-wrapper small active" v-if="loading">
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
                        <span v-else>Save</span>
                        
                    </a>
                </div>
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
                viewState: 0,
                product: {
                    name: '',
                    info: '',
                    productId: '',
                    model: '',
                    price: '',
                    imageUrl: null,
                    category_id: 1
                },
                loading: false,
                userToken: null
            };
        },
        props: {},
        mounted() {
            this.getUserDetails()
        },
        methods: {
            getUserDetails(){
                // userDetails
                axios
                .get("/userDetails")
                .then((res) => {
                    this.userToken = res.data.accessToken;
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
            selectNavView(value){
                this.viewState = value;
            },
            imgUpload(e) {
                if (!e.target.files.length) return;
                this.product.imageUrl = e.target.files;
            },
            addProduct(){
                this.loading = !this.loading;
                let formData = new FormData();
                $.each(this.product.imageUrl, function (key, image) {
                    formData.append(`imageUrl[${key}]`, image);
                });
                formData.append("title", this.product.name);
                formData.append("info", this.product.info);
                formData.append("code", this.product.productId);
                formData.append("model", this.product.model);
                formData.append("price", this.product.price);
                // formData.append("imageUrl", this.product.imageUrl);
                formData.append("category_id", this.product.category_id);

                axios
                .post("/api/products", formData)
                .then((res) => {
                    if(res.data.status === 501){
                        // let err = res.data.error.slice(0, chunk);
                        M.toast({
                            html: `${res.data.error}`,
                            classes: "errorNotifier",
                        });
                    } else if(res.data.status === 201){
                        M.toast({
                            html: res.data.message,
                            classes: "successNotifier",
                        });

                        this.resetAddProductForm();
                        let elem = document.getElementById('addProductModal');
                        var instance = M.Modal.getInstance(elem);
                        instance.close();
                    }                       
                })
                .catch((err) => {
                    console.log(err);
                });
            },
            resetAddProductForm(){
                this.product = {
                    name: '',
                    info: '',
                    productId: '',
                    model: '',
                    price: '',
                    imageUrl: null,
                    category_id: 1
                }
            }
        },
    };
</script>
