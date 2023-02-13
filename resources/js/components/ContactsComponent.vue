<template>
    <HeaderComponent></HeaderComponent>
    <div class="row" id="productsHeader">
        <div class="container">
            <h1 class="white-text">Contact Us</h1>

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
    <div class="row">
        <div class="col l12">
            <img :src="'./img/map.png'" class="responsive-img" alt=""/>
        </div>
    </div>
    <div class="row marginTop-15 contactDetails">
        <div class="col l3 center-align">
            <div class="row contactCard">
                <div class="col l12">
                    <i class="material-icons mailIcon">email</i>
                </div>
                <div class="col l12">
                    <h4 class="contactTitle">Email</h4>
                </div>
                <div class="col l12">
                    <p>AutoquipLLC@mail.com</p>
                </div>
            </div>
        </div>

        <div class="col l3 center-align">
            <div class="row contactCard">
                <div class="col l12">
                    <i class="material-icons callIcon">phone</i>
                </div>
                <div class="col l12">
                    <h4 class="contactTitle">Call</h4>
                </div>
                <div class="col l12">
                    <p>Phone: (510) 396-1922</p>
                </div>
            </div>
        </div>

        <div class="col l3 center-align">
            <div class="row contactCard">
                <div class="col l12">
                    <i class="material-icons faxIcon">speaker_phone</i>
                </div>
                <div class="col l12">
                    <h4 class="contactTitle">Fax</h4>
                </div>
                <div class="col l12">
                    <p>Phone: (510) 396-1922</p>
                </div>
            </div>
        </div>

        <div class="col l3 center-align">
            <div class="row contactCard">
                <div class="col l12">
                    <i class="material-icons addressIcon">location_on</i>
                </div>
                <div class="col l12">
                    <h4 class="contactTitle">Address</h4>
                </div>
                <div class="col l12">
                    <p>Fremont, California</p>
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
