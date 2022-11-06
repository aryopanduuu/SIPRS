<template>
    <section class="section account-content">
        <div class="row justify-content-md-center">
            <AppointmentStep1 @set-current-step="setCurrentStep" @set-user="setUser" v-if="currentStep == 1" />
            <AppointmentStep2 @set-current-step="setCurrentStep" :user="user" v-if="currentStep == 2" />
            <AppointmentStep3 @set-current-step="setCurrentStep" v-if="currentStep == 3" />
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
                listPoli: ['op1', 'op2', 'op3'],
                user: {}
            }
        },
        methods: {
            setCurrentStep(step) {
                this.currentStep = step
                if (step == 1) {
                    this.user = {}
                }
            },
            setUser(user) {
                this.user = user
            }
        }
    }

</script>
