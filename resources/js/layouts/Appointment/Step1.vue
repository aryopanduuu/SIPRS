<!-- eslint-disable vue/multi-word-component-names -->
<template>
	<div class="col">
		<h3 class="title mb-4 text-center font-weight-bold">Pendaftaran Online Pasien Lama</h3>
		<div class="account-box">
			<div class="form-group">
				<label for="nomor_rekam_medis">
					Nomor Rekam Medis<span class="text-red">*</span>
				</label>
				<div class="input-group">
					<input name="nomor_rekam_medis" ref="nomor_rekam_medis" class="form-control"
						:class="{ 'is-invalid': errMessage.nomor_rekam_medis }" placeholder="001-86-5645"
						value="001-86-5645" @keyup.enter="searchNomorRekamMedis" @input="toggleClearBtn" />
					<button type="button" class="btn bg-transparent btn-clear" v-if="showClearBtn" @click="clearInput">
						<i class="fa fa-times"></i>
					</button>
				</div>
				<div class="invalid-feedback d-block" v-if="errMessage.nomor_rekam_medis">
					<p>{{ errMessage.nomor_rekam_medis[0] }}</p>
				</div>
			</div>
			<div class="form-group">
				<label for="tgl_lahir">
					Tanggal Lahir<span class="text-red">*</span>
				</label>
				<input type="date" name="tgl_lahir" ref="tgl_lahir" class="form-control" value="1967-04-19"
					:class="{ 'is-invalid': errMessage.tgl_lahir }" @keyup.enter="searchNomorRekamMedis" />
				<div class="invalid-feedback d-block" v-if="errMessage.tgl_lahir">
					<p>{{ errMessage.tgl_lahir[0] }}</p>
				</div>
			</div>
			<!-- <div class="form-group">
                <vue-recaptcha ref="recaptcha" @verify="setRecaptcha" @error="setRecaptchaError"
                    :sitekey="recaptchaSiteKey" />
                <div class="invalid-feedback d-block" v-if="errMessage.recaptcha">
                    <p>{{ errMessage.recaptcha[0] }}</p>
                </div>
            </div> -->
			<div class=" form-group text-center m-b-0">
				<button class="account-btn btn btn-primary" @click="searchNomorRekamMedis">
					<i class="fa fa-search"></i> Cari
				</button>
			</div>
		</div>
	</div>
</template>

<script>
import {
	VueRecaptcha
} from 'vue-recaptcha';
export default {
	// components: {
	// VueRecaptcha
	// },
	data() {
		return {
			errMessage: {},
			showClearBtn: false,
			recaptchaSiteKey: import.meta.env.VITE_RECAPTCHA_SITE_KEY,
			recaptchaToken: null
		}
	},
	mounted() {
		new Cleave(this.$refs.nomor_rekam_medis, {
			delimiters: ['-', '-', '-', '-'],
			blocks: [3, 2, 4],
			uppercase: true
		})
	},
	methods: {
		setRecaptcha(response) {
			this.recaptchaToken = response
		},
		setRecaptchaError() {
			this.errMessage.recaptcha = ["Terjadi kesalahan ketika memuat recaptcha. Silahkan perbarui halaman."]
		},
		clearInput() {
			this.$refs.nomor_rekam_medis.value = null
			this.showClearBtn = false
		},
		toggleClearBtn() {
			if (this.$refs.nomor_rekam_medis.value.length) {
				this.showClearBtn = true
			} else {
				this.showClearBtn = false
			}
		},
		searchNomorRekamMedis() {
			this.errMessage = {}
			Notiflix.Block.standard('.account-box')
			this.nomor_rekam_medis = null

			axios({
				method: 'POST',
				url: '/api/appointment/checkNomorRekamMedis',
				data: {
					nomor_rekam_medis: this.$refs.nomor_rekam_medis.value,
					tgl_lahir: this.$refs.tgl_lahir.value
					// recaptcha: $$this.recaptchaToken
				},
				headers: {
					'X-Dry-Run': true,
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			})
				.then((result) => {
					this.$emit('setUser', result.data.data)
					this.$emit('setCurrentStep', 2)
					Notiflix.Block.remove('.account-box')
				})
				.catch((err) => {
					if (err.response.data.errors) {
						this.errMessage = err.response.data.errors
						this.$refs.nomor_rekam_medis.focus()
						Notiflix.Block.remove('.account-box')
					}
				})
		}
	}
}

</script>
