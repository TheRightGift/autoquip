<template>
    <HeaderComponent></HeaderComponent>
    <div class="row" id="productsHeader">
        <div class="container">
            <h1 class="white-text">Products</h1>

            <div class="row">
                <div class="row marginTop-5" id="search">
                    <div class="input-field col l3">
                        <select class="browser-default">
                            <option value="" selected>Select Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="input-field col l5 prdtSearch">
                        <input placeholder="Search Products" type="search" class="browser-default padding-5 prdtSearchInput"/>
                        <button class="btn prdtSearchBtn">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row marginTop-15" id="productDetails">
        <div class="container">
            <div class="col l6">
                <div class="row">
                    <div class="col l12 productMainImage">
                        <img :src="'./img/singelProduct.png'" class="responsive-img" alt="Semi Conductor Plate">
                    </div>
                </div>
                <div class="row">
                    <div class="col l3">
                        <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                    </div>
                    <div class="col l3">
                        <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                    </div>
                    <div class="col l3">
                        <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                    </div>
                    <div class="col l3">
                        <img :src="'./img/semiConductorPlate.png'" class="responsive-img" alt="Semi Conductor Plate">
                    </div>
                </div>
            </div>
            <div class="col l4 offset-l1 productDescription">
                <h4>Semiconductor</h4>
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
                    <button class="btn prdtSearchBtn">Add to Cart</button> <button class="btn prdtSearchBtn">Make Enquiry</button>
                </p>
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
            return {};
        },
        props: {},
        data() {
            return {};
        },
        mounted() {},
        methods: {},
    };
</script>
