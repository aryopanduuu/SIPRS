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
                                <td>{{ user.nama_user }}</td>
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
                            <select name="poli" ref="poli" class="select">
                                <option value="" disabled selected>Pilih</option>
                                <option v-for="(poli, i) in listPoli" :value="poli.id" :key="i">
                                    {{ poli.nama_poli }}
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
                            <input type="date" class="form-control" ref="tgl_periksa" min="2022-11-04"
                                :class="{'is-invalid': errMessage.tgl_periksa}">
                            <div class="invalid-feedback d-block" v-if="errMessage.tgl_periksa">
                                <p>{{ errMessage.tgl_periksa[0] }}</p>
                            </div>
                        </div>
                        <div class="form-group text-center m-b-0">
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
            user: Object
        },
        data() {
            return {
                listPoli: {},
                errMessage: {},
                minDate: null
            }
        },
        watch: {
            errMessage(newValue, oldValue) {
                if (newValue.poli) {
                    $('.select2').css('border', '1px solid #dc3545')
                } else {
                    $('.select2').css('border', '')
                }
            }
        },
        mounted() {
            const date = new Date()
            let day = date.getDate() > 9 ? "0" + date.getDate() : date.getDate()
            let month = date.getMonth() + 1
            let year = date.getFullYear()
            this.minDate = `${year}-${month}-${day}`

            Notiflix.Block.standard('.box-form')
            this.getPoli()
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
            this.initSelect2()
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
                        url: '',
                        data: {
                            poli: this.$refs.poli.value,
                            tgl_periksa: this.$refs.tgl_periksa.value,
                            step: 2
                        },
                        headers: {
                            'X-Dry-Run': true,
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .then((result) => {
                        if (result.data.status == 200) {
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
            getPoli() {
                return axios({
                    method: 'POST',
                    url: '/api/getPoli',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
            }
        }
    }

</script>
