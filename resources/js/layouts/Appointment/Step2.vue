<!-- eslint-disable vue/multi-word-component-names -->
<template>
	<div class="col-md-11">
		<a href="javascript:;" @click="$emit('setCurrentStep', 1)">
			<span class="font-weight-bold"><i class="fa fa-arrow-left"></i> Kembali</span>
		</a>
		<div class="row mt-3">
			<div class="col-md-12 col-lg-8 mb-3 mb-lg-0">
				<div class="account-box w-100 ml-0">
					<table class="table table-borderless mb-0">
						<tbody>
							<tr>
								<th>Nama</th>
								<td>{{ user.nama }}</td>
							</tr>
							<tr>
								<th>Tanggal Lahir</th>
								<td>{{ user.tgl_lahir }}</td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td>{{ user.jk }}</td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td>{{ user.alamat }}</td>
							</tr>
							<tr>
								<th>Nomor HP</th>
								<td>{{ user.no_hp }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="account-box box-form w-100 mr-0">
					<div class="appointment">
						<div class="form-group">
							<label for="poli">
								Poli<span class="text-red">*</span>
							</label>
							<select name="poli" @change="getPoli()" class="select">
								<option value="" disabled selected>Pilih</option>
								<option v-for="(lp, i) in listPoli" :value="lp.id" :key="i" :selected="lp.id == poli">
									{{ lp.key }}
								</option>
							</select>
							<div class="invalid-feedback d-block" v-if="errMessage.poli">
								<p>{{ errMessage.poli[0] }}</p>
							</div>
						</div>
						<div class="form-group">
							<label for="tgl_periksa">
								Tanggal Periksa <span class="text-red">*</span>
							</label>
							<input type="date" class="form-control" :value="tgl_periksa"
								@v-keyup:enter="setScheduleAppointment()"
								@input="$emit('update:tgl_periksa', $event.target.value)" @change="getJamKerja()"
								:min="minDate" :max="maxDate" :class="{ 'is-invalid': errMessage.tgl_periksa }">
							<div class="invalid-feedback d-block" v-if="errMessage.tgl_periksa">
								<p>{{ errMessage.tgl_periksa[0] }}</p>
							</div>
						</div>
						<div class="form-group">
							<label for="tgl_periksa">
								Jam Kerja <a href="" target="_blank">
									<i class="fa-solid fa-question-circle cursor-pointer" data-toggle="tooltip"
										title="Lihat semua jadwal poli"></i>
								</a>
							</label>
							<div class="d-block">
								<span class="font-italic text-danger" v-if="errMessage.jam_kerja">
									{{ errMessage.jam_kerja[0] }}
								</span>
								<span class="font-italic text-danger" v-else-if="!poli || !tgl_periksa">
									Silahkan pilih poli dan tanggal periksa terlebih dahulu.
								</span>
								<span class="font-weight-bold" v-else>
									{{ jam_kerja }}
								</span>
							</div>
						</div>
						<hr />
						<div class="form-group text-center m-b-0" v-if="jam_kerja">
							<button type="submit" class="btn btn-primary account-btn" @click="setScheduleAppointment">
								Selanjutnya <i class="fa fa-chevron-circle-right"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		user: Object,
		poli: String,
		tgl_periksa: String,
		nama_poli: String,
		jam_kerja: String
	},
	data() {
		return {
			listPoli: {},
			errMessage: {},
			minDate: null,
			maxDate: null
		}
	},
	watch: {
		errMessage(newValue, oldValue) {
			if (newValue.poli) {
				$('.select2').css('border', '1px solid #dc3545')
			} else {
				$('.select2').css('border', '')
			}
		},
	},
	mounted() {
		$('[data-toggle="tooltip"]').tooltip()
		const date = new Date()
		let minDay = date.getDate() < 10 ? "0" + date.getDate() : date.getDate()
		let maxDay = date.getDate() < 10 ? "0" + date.getDate() + 7 : date.getDate() + 7
		let month = date.getMonth() + 1
		let year = date.getFullYear()
		this.minDate = `${year}-${month}-${minDay}`
		this.maxDate = `${year}-${month}-${maxDay}`

		this.getPoli()
		this.initSelect2()

		let $this = this
		$('select[name="poli"]').on('change', function (e) {
			$this.$emit('update:poli', e.target.value)
			$this.$nextTick(() => {
				$this.getJamKerja()
			})
		})
	},
	methods: {
		initSelect2() {
			$('.select').select2({
				width: '100%'
			});
		},
		setScheduleAppointment() {
			this.errMessage = {}
			Notiflix.Block.standard('.box-form')

			axios({
				method: 'POST',
				url: '/api/appointment/checkTglPemesanan',
				data: {
					poli: this.poli,
					tgl_periksa: this.tgl_periksa
				},
				headers: this.headersAjax(true)
			})
				.then((result) => {
					if (result.data.status == 200) {
						let $this = this
						this.listPoli.forEach((val, index) => {
							if (val.id == this.poli) {
								$this.$emit('update:nama_poli', val.key);
								return false;
							}
						})
						this.$emit('setCurrentStep', 3)
					}
				})
				.catch((err) => {
					if (err.response.data.errors) {
						this.errMessage = err.response.data.errors
						Notiflix.Block.remove('.box-form')
					}
				})
		},
		getJamKerja() {
			if (this.poli.length && this.tgl_periksa.length) {
				Notiflix.Block.standard('.box-form')
				delete this.errMessage.jam_kerja

				axios({
					method: 'POST',
					url: '/api/getJamKerjaPoli',
					data: {
						poli: this.poli,
						hari: this.tgl_periksa
					},
					headers: this.headersAjax()
				})
					.then((result) => {
						if (result.data.status == 200) {
							this.$emit('update:jam_kerja', result.data.data)
						}
					})
					.catch((err) => {
						if (err.response.data.errors) {
							this.errMessage = err.response.data.errors
							this.$emit('update:jam_kerja', '')
						}
					})
					.finally(() => Notiflix.Block.remove('.box-form'))
			} else {
				delete this.errMessage.jam_kerja
				this.$emit('update:jam_kerja', '')
			}
		},
		getPoli() {
			Notiflix.Block.standard('.box-form')

			axios({
				method: 'POST',
				url: '/api/getPoli',
				headers: this.headersAjax()
			})
				.then((result) => {
					Notiflix.Block.remove('.box-form')
					this.listPoli = result.data.data
				})
				.catch((err) => {
					Swal.fire({
						title: 'Terjadi Kesalahan!',
						html: 'Gagal memuat daftar poli yang tersedia.<br/>Silahkan hubungi pihak terkait.',
						icon: 'error',
					})
				})
		},
		headersAjax(validate = false) {
			const jsonHeader = {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			if (validate) {
				Object.assign(jsonHeader, {
					'X-Dry-Run': true
				})
			}
			return jsonHeader;
		}
	}
}

</script>
