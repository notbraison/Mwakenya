//import './assets/main.css'
import { createApp } from 'vue'
import { createStore } from 'vuex'
import './style.css'
import App from './App.vue'
//import store from './store'
import router from './router/router';
const app = createApp(App)
//app.use(store)
app.use(router);
app.mount('#app');




/*  */




