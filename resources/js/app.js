import './bootstrap';
import {
    createApp
} from 'vue'

const app = createApp()

//Component
import Appointment from '@/pages/AppointmentPage.vue'

app.component('AppointmentPage', Appointment)
app.mount('#app')
