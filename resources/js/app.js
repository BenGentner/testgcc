import './bootstrap.js';
import Vue from "vue";
import Navigation from "./components/navigation.vue"
import Contact from "./components/contact.vue"



new Vue ({
    el:"#vue-nav",

    components: {Navigation}
})
new Vue ({
    el:"#app",

    components: {Contact}
})
