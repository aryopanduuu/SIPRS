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
                                <th>Jam Kerja</th>
                                <th>
                                    Perkiraan Antrian
                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                        title="Diperbarui otomatis setiap 1 menit."></i>
                                </th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" v-for="(dokter, i) in listDokter.data" :key="i">
                                <td class="p-2">
                                    <img src="/assets/img/doctor-01.jpg" alt="" class="img-fluid rounded-circle"
                                        width="85">
                                </td>
                                <td class="p-2 vertical-align-middle">
                                    {{ dokter.nama }}<br />
                                    <small class="text-muted d-none d-sm-block" data-toggle="tooltip"
                                        :title="dokter.spesialis.join(', ')">
                                        {{ dokter.spesialis.join(', ').length > 40 ? dokter.spesialis.join(', ').substring(0, 40) + '...' : dokter.spesialis.join(', ') }}
                                    </small>
                                </td>
                                <td class="p-2 vertical-align-middle">
                                    08:00 - 12:00
                                </td>
                                <td class="p-2 vertical-align-middle">08:00</td>
                                <td class="p-2 vertical-align-middle">
                                    <button class="btn btn-primary">
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
            appointment: Object
        },
        data() {
            return {
                listDokter: {}
            }
        },
        mounted() {
            this.getDokter()

            setInterval(() => {
                this.getDokter()
            }, 300000)
        },
        methods: {
            getDokter(page = 1) {
                Notiflix.Block.standard('.account-box')
                axios({
                        method: 'POST',
                        url: `/api/getDokter?page=${page}`,
                        data: {
                            poli: this.appointment.poli
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
