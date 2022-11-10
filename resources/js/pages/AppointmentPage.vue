<template>
    <section class="section account-content">
        <div class="row justify-content-md-center">
            <AppointmentStep1 @set-current-step="setCurrentStep" @set-user="setUser" v-if="currentStep == 1" />
            <AppointmentStep2 @set-current-step="setCurrentStep" @set-appointment="setAppointment" :user="user"
                :appointment="appointment" v-if="currentStep == 2" />
            <AppointmentStep3 @set-current-step="setCurrentStep" :appointment="appointment" v-if="currentStep == 3" />
        </div>
    </section>
</template>

<script>
    import AppointmentStep1 from '../layouts/Appointment/Step1.vue'
    import AppointmentStep2 from '../layouts/Appointment/Step2.vue'
    import AppointmentStep3 from '../layouts/Appointment/Step3.vue'
    export default {
        components: {
            AppointmentStep1,
            AppointmentStep2,
            AppointmentStep3
        },
        data() {
            return {
                currentStep: 1,
                appointment: {},
                user: {}
            }
        },
        watch: {
            currentStep(newValue, oldValue) {
                if (newValue == 1) {
                    this.user = {}
                }
                if (newValue == 2 && oldValue == 1) {
                    this.appointment = {}
                }
            }
        },
        methods: {
            setCurrentStep(step) {
                this.currentStep = step
            },
            setUser(user) {
                this.user = user
            },
            setAppointment(appointment) {
                this.appointment = appointment
            }
        }
    }

</script>
