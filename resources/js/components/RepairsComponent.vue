<template>
    <HeaderComponent></HeaderComponent>
    <div class="row" id="productsHeader">
        <div class="container">
            <h1 class="white-text">Repair Center</h1>

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
    <div class="row marginTop-10" id="repairIntro">
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <h2 class="sectionHead">
                        Repair Center
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <p>
                        After being inspected, repaired, and tested, the modules and parts are then returned to the customer along with a report detailing the warranty and repairs. Within our Quality Control Systems, all repairs are carried out in accordance with tried and true procedures.
                    </p>
                    <p class="noMarginBottom"> 
                        High-Value Repairs consist of the following:
                    </p>
                </div>
                <div class="col l12 viewAll">
                    <p class="noMarginTop noMarginBottom right-align">
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

    <div class="row marginTop-10" id="repairEnquiry">
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <h2 class="sectionHead">
                        Get in Touch With Us for Additional Information
                    </h2>
                </div>
            </div>

            <div class="enquiryFormWrapper">
                <div class="row">
                    <div class="input-field col l2">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field col l10">
                        <input id="name" type="text" class="browser-default">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l2">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="input-field col l10">
                        <input id="phone" type="tel" class="browser-default">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l2">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col l10">
                        <input id="email" type="email" class="browser-default">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l2">
                        <label for="message">Message</label>
                    </div>
                    <div class="input-field col l10">
                        <textarea id="message" rows="10" class="browser-default"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l2"></div>
                    <div class="input-field col l10 center-align">
                        <button class="btn">send</button>
                    </div>
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
