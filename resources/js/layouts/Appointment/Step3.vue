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
                        title="Perbarui untuk melihat perkiraan antrian terbaru.">
                        <i class="fa fa-xs fa-sync mr-2"></i> Perbarui
                    </button>
                </div>
                <div class="account-box mt-3 w-100 ml-0">
                    <table class="table table-hover mb-0">
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
                            <tr class="text-center">
                                <td class="p-2">
                                    <img src="/assets/img/doctor-01.jpg" alt="" class="img-fluid rounded-circle"
                                        width="85">
                                </td>
                                <td class="p-2 vertical-align-middle">
                                    John Doe<br />
                                    <small class="text-muted d-none d-sm-block" data-toggle="tooltip"
                                        title="Spesialis Prostodonsia, Spesialis Konservasi Gigi">
                                        {{ 'Spesialis Prostodonsia, Spesialis Konservasi Gigi'.substring(0, 40) + '...' }}
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
                            <tr class="text-center">
                                <td class="p-2">
                                    <img src="/assets/img/doctor-01.jpg" alt="" class="img-fluid rounded-circle"
                                        width="85">
                                </td>
                                <td class="p-2 vertical-align-middle">
                                    Jane Doe<br />
                                    <small class="text-muted d-none d-sm-block" data-toggle="tooltip" title="Spesialis Ortodonti, Spesialis
                                            Periodonsia">
                                        {{ 'Spesialis Ortodonti, Spesialis Periodonsia'.substring(0, 40) + '...' }}
                                    </small>
                                </td>
                                <td class="p-2 vertical-align-middle">
                                    14:30 - 19:00
                                </td>
                                <td class="p-2 vertical-align-middle">17:45</td>
                                <td class="p-2 vertical-align-middle">
                                    <button class="btn btn-primary">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            $('[data-toggle="tooltip"]').tooltip()
        }
    }

</script>
