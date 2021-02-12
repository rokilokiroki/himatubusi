import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import VueYoutube from 'vue-youtube'

createApp({
    components:{
        ExampleComponent,
        VueYoutube
    }
}).mount('#app')