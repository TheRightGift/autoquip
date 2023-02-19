/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

/**GUEST COMPONENTS */
import HomeComponent from './components/HomeComponent.vue';
import ProductsComponent from './components/ProductsComponent.vue';
import SingleProductComponent from './components/SingleProductComponent.vue';
import RepairsComponent from './components/RepairsComponent.vue';
import WarehouseComponent from './components/WarehouseComponent.vue';
import ContactsComponent from './components/ContactsComponent.vue';

/**AUTH COMPONENTS */
import GetstartedComponent from './components/auth/GetstartedComponent.vue';
import SigninComponent from './components/auth/SigninComponent.vue';
import ForgotPasswordComponent from './components/auth/ForgotPasswordComponent.vue';

// Guest components registration
app.component('home-component', HomeComponent);
app.component('products-component', ProductsComponent);
app.component('single-products-component', SingleProductComponent);
app.component('repairs-component', RepairsComponent);
app.component('warehouse-component', WarehouseComponent);
app.component('contacts-component', ContactsComponent);
// Auth components registration
app.component('get-started-component', GetstartedComponent);
app.component('signin-component', SigninComponent);
app.component('forgot-password-component', ForgotPasswordComponent);


app.mount('#app');
