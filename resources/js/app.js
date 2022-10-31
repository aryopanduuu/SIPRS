import './bootstrap';
import {
    createApp
} from 'vue'

const app = createApp()

//Component
import Appointment from '@/pages/Appointment.vue'

app.component('Appointment', Appointment)
app.mount('#app')
