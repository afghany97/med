/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import {createApp} from 'vue';
import app from "./components/App.vue";
import SliderComponent from './components/Slider.vue';
import Navigation from './components/Navigation.vue';
import HorizontalList from './components/HorizontalList.vue';

// window.Vue = import 'vue';

// window.Events = new class{
//     constructor() {
//         this.vue =  createApp(app);
//     }
//
//     fire(event, data = null) {
//         this.vue.$emit(event, data);
//     }
//
//     listen(event, callback) {
//         this.vue.$on(event, callback);
//     }
// };

createApp(app)
    .component('slider',SliderComponent)
    .component('navigation',Navigation)
    .component('HorizontalList',HorizontalList)
    .mount('#app')


