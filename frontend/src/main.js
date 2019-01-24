import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import Toasted from 'vue-toasted';
import SweetModal from 'sweet-modal-vue/src/plugin.js';

const API_URL = 'http://taskapi.test/api';

require('./assets/style.css');
Vue.config.productionTip = false;

window.API_URL = API_URL;
window.axios = require('axios');
window.EventHub = new Vue();

// TODO : please find a nice spot for me
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.datepicker');
  var instances = M.Datepicker.init(elems);
});

/**
 * Vuejs Toast for User Feedback
 */
Vue.use(Toasted, { 
  theme: "bubble", 
  position: "top-right", 
  duration : 5000
});


Vue.use(SweetModal);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
