<!-- eslint-disable vue/multi-word-component-names -->
<template>
	<div class="col-md-11 mx-md-auto">
		<div class="row">
			<div class="col-11 mx-lg-auto p-0">
				<div class="d-flex justify-content-between">
					<a href="javascript:;" @click="$emit('setCurrentStep', 2)">
						<span class="font-weight-bold"><i class="fa fa-arrow-left"></i> Kembali</span>
					</a>
					<button class="btn btn-light border-dark" data-toggle="tooltip"
						title="Perbarui untuk melihat perkiraan antrian terbaru." @click="getDokter()">
						<i class="fa fa-xs fa-sync mr-2"></i> Perbarui
					</button>
				</div>
				<div class="account-box mt-3 w-100 ml-0">
					<table class="table table-hover">
						<thead class="table-borderless">
							<tr class="text-center">
								<th></th>
								<th>Dokter</th>
								<th>
									Perkiraan Antrian
									<i class="fa fa-question-circle" data-toggle="tooltip"
										title="Diperbarui otomatis setiap 5 menit."></i>
								</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<tr class="text-center" v-for="(dokter, i) in listDokter.data" :key="i">
								<td class="p-2">
									<img :src="'/assets/img/' + dokter.foto" alt="" class="img-fluid rounded-circle"
										width="85">
								</td>
								<td class="p-2 vertical-align-middle">
									{{ dokter.nama }}<br />
									<small class="text-muted d-none d-sm-block" data-toggle="tooltip"
										:title="dokter.spesialis.join(', ')">
										{{ joinSpesialis(dokter.spesialis) }}
									</small>
								</td>
								<td class="p-2 vertical-align-middle">{{ dokter.perkiraan_jam }}</td>
								<td class="p-2 vertical-align-middle">
									<button class="btn btn-primary" @click="showDetailAppointment(dokter.id)">
										Pilih
									</button>
								</td>
							</tr>
						</tbody>
					</table>
					<Bootstrap4Pagination :data="listDokter" align="center" @pagination-change-page="getDokter" />
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="detail-appointment" tabindex="-1" data-keyboard="false" v-if="showModal">
		<div class="modal-dialog modal-lg modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr align="center">
								<th colspan="2" class="border-0">Detil Pasien</th>
							</tr>
						</thead>
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
					<table class="table table-bordered">
						<thead>
							<tr align="center">
								<th colspan="2" class="border-0">Detil Booking</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>Poli</th>
								<td>{{ nama_poli }}</td>
							</tr>
							<tr>
								<th>Tanggal Periksa</th>
								<td>{{ tgl_periksa }}</td>
							</tr>
							<tr>
								<th>Jam Kerja</th>
								<td>{{ jam_kerja }}</td>
							</tr>
							<tr>
								<th>Dokter</th>
								<td>{{ nama_dokter }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary" @click="confirmEndAppointment()">Selesai</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import {
	Bootstrap4Pagination
} from 'laravel-vue-pagination';
export default {
	components: {
		Bootstrap4Pagination
	},
	props: {
		poli: String,
		tgl_periksa: String,
		jam_kerja: String,
		nama_poli: String,
		nama_dokter: String,
		dokter: String,
		user: Object
	},
	data() {
		return {
			listDokter: {},
			showModal: false
		}
	},
	watch: {
		showModal(newValue, oldValue) {
			if (newValue) {
				this.$nextTick(() => $('#detail-appointment').on('hidden.bs.modal', (event) => this.showModal = false))
			}
		}
	},
	mounted() {
		this.getDokter()
		setInterval(() => this.getDokter(), 300000)
	},
	methods: {
		showDetailAppointment(dokter) {
			this.listDokter.data.forEach((val, index) => {
				if (val.id == dokter) {
					this.$emit('update:nama_dokter', val.nama)
					this.$emit('update:dokter', dokter)
				}
			})
			this.showModal = true
			this.$nextTick(() => $('#detail-appointment').modal('show'))
		},
		confirmEndAppointment() {
			Swal.fire({
				icon: 'question',
				title: 'Selesaikan pemesanan antrian?',
				text: 'Pastikan pilihan anda telah benar.',
				showCancelButton: true,
				reverseButtons: true
			})
				.then((res) => {
					if (res.isConfirmed) {
						$('#detail-appointment').modal('hide')
						this.validateDokter()
					}
				})
		},
		validateDokter() {
			Notiflix.Block.standard('#app')
			axios({
				method: 'POST',
				url: '/api/dokter/checkDokterExists',
				data: {
					dokter: this.dokter,
					poli: this.poli
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			})
				.then((res) => {
					this.endAppointment()
				})
				.catch((err) => {
					Notiflix.Block.remove('#app')
					Swal.fire({
						icon: 'error',
						title: 'Terjadi kesalahan!',
						text: 'Data gagal diproses.'
					})
				})
		},
		endAppointment() {
			axios({
				method: 'POST',
				url: '/api/appointment/setAppointment',
				data: {
					user: this.user.id,
					poli: this.poli,
					tgl_periksa: this.tgl_periksa,
					dokter: this.dokter
				},
				headers: {
					'X-Dry-Run': true,
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			})
				.then((result) => {
					if (result.data.status == 200) {
						window.location.replace(result.data.url)
					}
				})
				.catch((err) => {
					Notiflix.Block.remove('#app')
					Swal.fire({
						icon: 'error',
						title: 'Terjadi kesalahan!',
						text: 'Data gagal diproses.'
					})
				})
		},
		joinSpesialis(spesialis) {
			return spesialis.join(', ').length > 40 ? spesialis.join(', ').substring(0, 40) + '...' : spesialis.join(', ')
		},
		getDokter(page = 1) {
			Notiflix.Block.standard('.account-box')
			axios({
				method: 'POST',
				url: `/api/dokter/getListDokter?page=${page}`,
				data: {
					poli: this.poli,
					tgl_periksa: this.tgl_periksa
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			})
				.then((result) => {
					this.listDokter = result.data.data
					this.$nextTick(() => {
						Notiflix.Block.remove('.account-box')
						$('[data-toggle="tooltip"]').tooltip()
					})
				})
				.catch((err) => {
					Swal.fire({
						title: 'Terjadi Kesalahan!',
						html: 'Gagal memuat daftar dokter yang tersedia.<br/>Silahkan hubungi pihak terkait.',
						icon: 'error',
					})
				})
		}
	}
}

</script>
