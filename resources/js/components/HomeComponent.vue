<template>
    <HeaderComponent :type="'noSubHeader'"></HeaderComponent>
    <div class="row" id="homeBanner">
        <div class="col l6 offset-l3">
            <div class="row bannerHeading">
                <div class="col l12">
                    <h1 class="center-align white-text">World Class<br/>Semiconductor Parts</h1>
                </div>
                <div class="col l12 verticalMargin-1">
                    <p class="center-align white-text">
                        Selling Semiconductor Parts &amp; Providing<br/> Semiconductor Storage &amp; Repair Services
                    </p>
                </div>
                <div class="col l12 center-align">
                    <a href="/products" class="btn">
                        Shop Now
                    </a>
                </div>
            </div>
            <div class="row marginTop-15" id="search">
                <!--div class="input-field col l5">
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
    <div class="row marginTop-15" id="popularPrdt">
        <div class="container">
            <div class="row">
                <div class="col l12 marginBottom-3">
                    <h2 class="sectionHead">
                        Popular Products
                    </h2>
                </div>
                <div class="col l4">
                    <p>
                        We have a wide range of products from<br/> a team of professional semiconductors<br/> and researchers
                    </p>
                </div>
                <div class="col l8 viewAll">
                    <p class="right-align">
                        <a href="/products">View all <i class="material-icons">arrow_forward</i></a>
                    </p>
                </div>
            </div>

            <div class="row" v-if="loadingProducts">
                <div class="col l12">
                    <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
                </div>
            </div>
            <div class="row" v-else>
                <div class="col l12" v-if="fourProducts === null">
                    <p class="center-align">
                        <i><small>No products yet. Check back in few hours.</small></i>
                    </p>
                </div>
                <div class="col l3" v-for="prdt in fourProducts" v-else>
                    <figure>
                        <img :src="'./img/'+prdt.images[0].url" class="responsive-img" alt="Semi Conductor Plate">
                        <figcaption>
                            {{prdt.title}}<br/>
                            {{prdt.code}}
                        </figcaption>
                    </figure>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row marginTop-15" id="qualiyParts">
        <div class="container">
            <div class="col l6 qualityPartDesc">
                <div class="marginBottom-3">
                    <h2 class="sectionHead">
                        Quality Parts
                    </h2>
                </div>
                <p  class="marginBottom-3">
                    Autoquip, LLC is an experienced company<br/> selling semiconductor parts, storage, and<br/> refurbishment worldwide. 
                </p>
                <p>
                    <a href="" class="btn">
                        Learn More
                    </a>
                </p>                    
            </div>
            <div class="col l6 qualityPartsImg">
                <div class="col l6">
                    <img :src="'./img/quality1.png'" class="responsive-img" alt=""/>
                </div>
                <div class="col l6">
                    <img :src="'./img/quality2.png'" class="responsive-img" alt=""/>
                </div>
                <div class="col l6">
                    <img :src="'./img/quality3.png'" class="responsive-img" alt=""/>
                </div>
                <div class="col l6">
                    <img :src="'./img/quality4.png'" class="responsive-img" alt=""/>
                </div>
            </div>
        </div>
    </div>
    <div class="row marginTop-15 marginBtm-15" id="whoWeAre">
        <div class="container whoWeAreContainer">
            <div class="col l6 whoWeAreDesc">
                <div class="marginBottom-5">
                    <h2 class="sectionHead">
                        Who We Are
                    </h2>
                </div>
                <p>
                    We have over 20 years of experience in this industry and focus on quality and reliability. The business started seven years ago and has since exceeded expectations while making long-term business relationships. We succeeded by making quality and punctuality our top priority.
                </p>
            </div>
            <div class="whoWeAreImgContainer col l6">
                <img :src="'./img/whoWeAre.png'" class="responsive-img" alt="Who We ARe"/>
            </div>
        </div>
    </div>
    <div class="row" id="reliableSolution">
        <div class="background">
            <div class="col35 coloredBackground">

            </div>
            <div class="col65 white">

            </div>
        </div>

        <div class="container reliableSolutionContent">
            <div class="col l6">
                <img :src="'./img/reliableSolu.png'" class="responsive-img" alt="Relaible Solutions"/>
            </div>
            <div class="col l6">
                <div class="marginBottom-5">
                    <h2 class="sectionHead">
                        Reliable Solution
                    </h2>
                </div>
                <p>
                    Apart from the parts we are selling on the site, we offer other semiconductor services such as
                </p>
                <p class="marginTop-2">
                    Professional Repairs 
                </p>
                <p class="marginTop-2">
                    Storage Facilities for Equipment
                </p>
                <p class="marginTop-2">
                    <a href="" class="btn">
                        Learn More
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="row" id="faq">
        <div class="container">
            <div class="marginBottom-5">
                <h2 class="center-align">
                    Frequently Asked Question
                </h2>
            </div>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header">
                        How does the enquiry process work?
                        <i class="material-icons">add</i>
                    </div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header">
                        How is the payment structured?
                        <i class="material-icons">add</i>
                    </div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header">
                        How do I make payments?
                        <i class="material-icons">add</i>
                    </div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header">
                        Can I pay Installmentally?
                        <i class="material-icons">add</i>
                    </div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </div>
    </div>
    <!--div class="row" id="enquiry">
        <div class="container center-align enquiryContainer">
            <div class="marginBottom-5">
                <h2 class="center-align">
                    Frequently Asked Question
                </h2>
            </div>
            <p class="marginTop-2">
                <a href="" class="btn">
                    Contact Us
                </a>
            </p>
        </div>
    </div-->
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
            return {};
        },
        props: {},
        data() {
            return {
                loadingProducts: true,
                allProducts: null,
                fourProducts: null
            };
        },
        mounted() {
            this.getAllProducts();
        },
        methods: {
            getAllProducts(){
                axios
                .get(`/api/products`)
                .then((res) => {
                    if(res.data.status === 200){
                        this.allProducts = res.data.products;
                        this.fourProducts = res.data.products.slice(0, 4);
                    } else {

                    }
                    this.loadingProducts = false;
                })
                .catch((err) => {
                    console.log(err);
                });
            }
        },
    };
</script>
