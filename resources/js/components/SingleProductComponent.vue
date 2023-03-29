<template>
    <HeaderComponent :cartItemsNum="cartItemsNum"></HeaderComponent>
    <div class="row" id="productsHeader">
        <div class="container">
            <h1 class="white-text">Products</h1>

            <div class="row">
                <div class="row marginTop-5" id="search">
                    <!--div class="input-field col l3">
                        <select class="browser-default">
                            <option value="" selected>Select Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div-->
                    <div class="input-field col l12 prdtSearch">
                        <input placeholder="Search Products" type="search" class="browser-default padding-5 prdtSearchInput"/>
                        <button class="btn prdtSearchBtn">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row marginTop-15" id="productDetails">
        <div class="container">
            <div class="col l12 center-align" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <div v-else>
                <div class="col l6">
                    <div class="row">
                        <div class="col l12 productMainImage">
                            <img :src="focusedImg" class="responsive-img" alt="Semi Conductor Plate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3" v-for="(img, index) in productDetail.images">
                            <img :src="img.url" class="responsive-img pointer" :alt="productDetail.title" @click="focusImage(index)">
                        </div>
                        <!--div class="col l3">
                            <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                        </div>
                        <div class="col l3">
                            <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                        </div>
                        <div class="col l3">
                            <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                        </div-->
                    </div>
                </div>
                <div class="col l4 offset-l1 productDescription">
                    <h4>{{productDetail.title}}</h4>
                    <h3>Equipment > ETCH</h3>
                    <h2>Centura DPS II POLY G5 AMAT</h2>
                    <ul class="browser-default">
                        <li>Condition As-Is Configuration Serial</li>
                        <li>Number - 417171VintageWafer</li>
                        <li>Size - 300mmTool</li>
                        <li>IDBG200227-01 Stock1 Warranty : No Warranty</li>
                        <li>Delivery: Ship within 10 DAYS after payment received</li>
                    </ul>
                    <p class="productActionBtns marginTop-10">
                        <button class="btn prdtSearchBtn" @click="addToCart()">
                            
                            <div class="preloader-wrapper small active" v-if="loadingAddCart">
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
                            <span v-else>Add to Cart</span> 
                        </button> 
                        <button class="btn prdtSearchBtn">Make Enquiry</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row marginTop-10" id="relatedPrdts">
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <h2 class="sectionHead">
                        Related Products
                    </h2>
                </div>
                <div class="col l12 viewAll">
                    <p class="noMarginTop right-align">
                        <a href="#">View all <i class="material-icons">arrow_forward</i></a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col l3">
                    <figure>
                        <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                        <figcaption>
                            Semiconductor Plate<br/>
                            AC-KVA445-B1
                        </figcaption>
                    </figure>
                </div>
                <div class="col l3">
                    <figure>
                        <img :src="'./img/autoPartsandCables.png'" class="responsive-img" alt="Auto Parts &amp; Cable">
                        <figcaption>
                            Auto Parts &amp; Cable<br/>
                            AC-KVA445-B1
                        </figcaption>
                    </figure>
                </div>
                <div class="col l3">
                    <figure>
                        <img :src="'./img/SemiconductorPlate2.png'" class="responsive-img" alt="Semi Conductor Plate">
                        <figcaption>
                            Semiconductor Plate<br/>
                            AC-KVA445-B1
                        </figcaption>
                    </figure>
                </div>
                <div class="col l3">
                    <figure>
                        <img :src="'./img/autoParts.png'" class="responsive-img" alt="Auto Parts &amp; Cable">
                        <figcaption>
                            Auto Parts &amp; Cable<br/>
                            AC-KVA445-B1
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <FooterComponent />
</template>

<script>
    import FooterComponent from "./partials/FooterComponent.vue";
    import HeaderComponent from "./partials/HeaderComponent.vue";
    export default {
        components: {
            FooterComponent,
            HeaderComponent,
        },
        data() {
            return {
                productDetail: null,
                loading: true,
                focusedImg: null,
                user: null,
                loadingAddCart: false,
                cartItemsNum: 0
            };
        },
        props: {
            product: Number
        },
        mounted() {
            this.getProductDetails();
            this.getUserDetails();
        },
        methods: {
            getProductDetails(){
                let id = parseInt(this.product);
                // console.log(this.product, id)
                axios
                .get("/api/products/"+id)
                .then((res) => {
                    if(res.data.status === 200){
                        this.productDetail = res.data.product;
                        this.focusImage(0);
                    }
                    // console.log(res.data.product.images);
                    this.loading = false;
                })
                .catch((err) => {
                    console.log(err);
                    this.loading = false;
                });
            },
            focusImage(i){
                this.focusedImg = this.productDetail.images[i].url;
                console.log(this.focusedImg);
            },
            getUserDetails(){
                axios
                .get("/userDetails")
                .then((res) => {
                    if(typeof res.data === 'object'){
                        this.user = res.data;
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            },
            addToCart(){
                this.loadingAddCart = true;
                let cartData = {
                    'product_id': parseInt(this.product),
                    'user_id': parseInt(this.user.id),
                    'qty': 1,
                }

                axios
                .post("/api/carts", cartData)
                .then((res) => {
                    if(res.data.status === 501){
                        M.toast({
                            html: res.data.error,
                            classes: "errorNotifier",
                        });
                    } else if(res.data.status === 201){
                        // Emit to header
                        this.cartItemsNum += 1;
                    }
                    this.loadingAddCart = false;                    
                })
                .catch((err) => {
                    console.log(err);
                    this.loading = false;
                });
            }
        },
    };
</script>
