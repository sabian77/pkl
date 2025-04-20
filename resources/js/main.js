import { createApp } from 'vue'
import App from './App.vue'
import "../css/app.css";

//import router
import router from './router'

//import Bootstrap, Popper, jQuery
import 'bootstrap/dist/css/bootstrap.css'
import 'jquery/dist/jquery.min'
import 'popper.js/dist/popper.min'
import 'bootstrap/dist/js/bootstrap.min'

const app = createApp(App)

//use router
app.use(router)

//mount app
app.mount('#app')