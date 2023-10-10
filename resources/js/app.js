import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import vue3GoogleLogin from 'vue3-google-login'
import Login from './components/Login.vue'
import FileManager from './components/FileManager.vue'
import Tags from './components/Tags.vue'
import Categories from './components/CategoryList.vue'
import 'notyf/notyf.min.css'; 


const CLIENT_ID = "1067202320775-21qp33udcvrv1l1pg2ceinrscostabra.apps.googleusercontent.com"

const app = createApp({});

app.use(vue3GoogleLogin, {
    clientId: CLIENT_ID,
});


app.component('Login', Login);
app.component('file-manager', FileManager);
app.component('tags', Tags);
app.component('categories', Categories);

app.mount("#app");