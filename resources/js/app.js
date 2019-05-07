require('./bootstrap');

window.Vue = require('vue');

Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('thought-component', require('./components/ThoughtComponent.vue').default);
Vue.component('contenedor-component', require('./components/ContenedorComponent.vue').default);



const app = new Vue({
    el: '#app'
});
