import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

require('./assets/style.css');
Vue.config.productionTip = false;

window.EventHub = new Vue();

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
