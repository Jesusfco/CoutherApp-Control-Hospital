require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('input-suggest-pacient', require('./components/Forms/InputSuggestPacient.vue'));

const app = new Vue({
    el: '#app'
});