require('./bootstrap');

import VueGtag from "vue-gtag";
import { createApp } from 'vue'
import App from './App.vue'
import router from "./Router/index"
import "bootstrap"
import "bootstrap/dist/css/bootstrap.min.css"
import "./styles/App.css"
import "./styles/Service.css"
import "./styles/Categories.css"
import "./styles/Resources.css"
// import "./styles/cookie.css"

// Import Center component


const app = createApp(App)

// Register Center component globally
app.component('center', Center) // Now <center> can be used anywhere

app.use(router)
app.use(VueGtag, {
    config: { id: "G-J44EEK3GSP" }
})
app.mount('#app')
