<template>
    <section class="section account-content">
        <div class="row">
            <div class="col">
                <div class="account-box">
                    <div class="form-group">
                        <label name="nomor_rekam_medis">
                            Nomor Rekam Medis<span class="text-red">*</span>
                        </label>
                        <div class="input-group">
                            <input name="nomor_rekam_medis" ref="nomor_rekam_medis" class="form-control"
                                :class="{'is-invalid': anyError}" placeholder="45-111-FG-G4"
                                @keyup.enter="searchNomorRekamMedis" @input="toggleClearBtn" />
                            <button type="button" class="btn bg-transparent" v-if="showClearBtn"
                                style="right: 20px; z-index: 100;position: absolute;" @click="clearInput">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback d-block" v-if="anyError">
                            <p>{{ errMessage }}</p>
                        </div>
                    </div>
                    <div class=" form-group text-center m-b-0">
                        <button class="account-btn btn btn-primary" @click="searchNomorRekamMedis">
                            <i class="fa fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                anyError: false,
                errMessage: null,
                showClearBtn: false
            }
        },
        methods: {
            clearInput(event) {
                this.$refs.nomor_rekam_medis.value = null
                this.showClearBtn = false
            },
            toggleClearBtn(event) {
                if (this.$refs.nomor_rekam_medis.value.length) {
                    this.showClearBtn = true
                } else {
                    this.showClearBtn = false
                }
            },
            searchNomorRekamMedis(event) {
                let $$this = this
                let errLabel = $('.invalid-feedback')
                $.ajax({
                    method: 'POST',
                    data: {
                        nomor_rekam_medis: $$this.$refs.nomor_rekam_medis.value
                    },
                    headers: {
                        'X-Dry-Run': true,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {
                        Notiflix.Block.standard('.account-box')
                        errLabel.removeClass('d-block')
                        $$this.anyError = false
                        $$this.nomor_rekam_medis = null
                    },
                    complete: function () {
                        Notiflix.Block.remove('.account-box')
                    },
                    success: function (result, status, xhr) {
                        if (!result.total) {
                            errLabel.addClass('d-block').html(`<p>${result.msg}</p>`)
                            $$this.$refs.nomor_rekam_medis.focus()
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#errMessage').html(123)
                        if (xhr.responseJSON.errors) {
                            $$this.anyError = true
                            let errors = xhr.responseJSON.errors
                            $$this.errMessage = errors.nomor_rekam_medis[0]
                        }
                    }
                })
            }
        }
    }

</script>
