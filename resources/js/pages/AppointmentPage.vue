<template>
	<section class="section account-content">
		<div class="row justify-content-md-center">
			<AppointmentStep1 @set-current-step="setCurrentStep" @set-user="setUser" v-if="currentStep == 1" />
			<AppointmentStep2 @set-current-step="setCurrentStep" :user="user" v-model:poli="form.poli"
				v-model:tgl_periksa="form.tgl_periksa" v-model:jam_kerja="detail.jam_kerja"
				v-model:nama_poli="detail.nama_poli" v-if="currentStep == 2" />
			<AppointmentStep3 @set-current-step="setCurrentStep" v-model:poli="form.poli"
				v-model:tgl_periksa="form.tgl_periksa" v-model:dokter="form.dokter" v-model:jam_kerja="detail.jam_kerja"
				v-model:nama_poli="detail.nama_poli" v-model:nama_dokter="detail.nama_dokter" :user="user"
				v-if="currentStep == 3" />
		</div>
	</section>
</template>

<script>
import { reactive } from 'vue'
import AppointmentStep1 from '../layouts/Appointment/Step1.vue'
import AppointmentStep2 from '../layouts/Appointment/Step2.vue'
import AppointmentStep3 from '../layouts/Appointment/Step3.vue'
export default {
	components: {
		AppointmentStep1,
		AppointmentStep2,
		AppointmentStep3
	},
	setup() {
		const form = reactive({
			poli: '',
			tgl_periksa: '',
			dokter: ''
		})

		const detail = reactive({
			nama_poli: '',
			jam_kerja: '',
			nama_dokter: ''
		})

		return { form, detail }
	},
	data() {
		return {
			currentStep: 1,
			user: {}
		}
	},
	watch: {
		currentStep(newValue, oldValue) {
			if (newValue == 1) {
				this.user = {}
			}
			if (newValue == 2 && oldValue == 1) {
				this.form = reactive({
					poli: '',
					tgl_periksa: '',
					dokter: ''
				})
				this.detail = reactive({
					nama_poli: '',
					nama_dokter: '',
					jam_kerja: ''
				})
			}
			if (newValue == 2 && oldValue == 3) {
				this.form.dokter = ''
				this.detail.nama_dokter = ''
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
	}
}

</script>
