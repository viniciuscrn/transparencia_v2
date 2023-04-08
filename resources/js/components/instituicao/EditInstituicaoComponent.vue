<template>
    <div class="modal fade" id="editInstituicao" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true" v-if="modalShow">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="modalTitleId">Editar Insituição</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="edit">
                        <div class="form-group row">
                            <label for="cnpj" class="col-md-3 col-form-label text-md-right">CNPJ *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" :class="{ 'is-invalid': errors.cnpj }"
                                    v-mask="'##.###.###/####-##'" v-model="cnpj">
                                <alert-input-component v-if="errors.cnpj" alert="danger" :text="errors.cnpj[0]" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-md-3 col-form-label text-md-right">Razão Social *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" :class="{ 'is-invalid': errors.nome }"
                                    v-model="nome">
                                <alert-input-component v-if="errors.nome" alert="danger" :text="errors.nome[0]" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="endereco" class="col-md-3 col-form-label text-md-right">Endereço *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" :class="{ 'is-invalid': errors.endereco }"
                                    v-model="endereco">
                                <alert-input-component v-if="errors.endereco" alert="danger" :text="errors.endereco[0]" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bairro" class="col-md-3 col-form-label text-md-right">Bairro *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" :class="{ 'is-invalid': errors.bairro }"
                                    v-model="bairro">
                                <alert-input-component v-if="errors.bairro" alert="danger" :text="errors.bairro[0]" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uf" class="col-md-3 col-form-label text-md-right">UF *</label>
                            <div class="col-md-6">
                                <select class="form-control" :class="{ 'is-invalid': errors.uf }" v-model="uf"
                                    @change="loadCities($event)">
                                    <option v-for="item in states" :value="item.id">{{ item.nome }}</option>
                                </select>

                                <alert-input-component v-if="errors.uf" alert="danger" :text="errors.uf[0]" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cidade" class="col-md-3 col-form-label text-md-right">Cidade *</label>
                            <div class="col-md-6">
                                <select class="form-control" v-model="cidade">
                                    <option selected>{{ cidade }}</option>
                                    <option v-for="item in cities" :value="item.nome">{{ item.nome }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-3 col-form-label text-md-right">Telefone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" v-mask="'(##)####-####'" v-model="tel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cel" class="col-md-3 col-form-label text-md-right">Celular</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" v-mask="['(##)####-####', '(##)#####-####']"
                                    v-model="cel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" v-model="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site" class="col-md-3 col-form-label text-md-right">Site</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" v-model="site">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-md-3 col-form-label text-md-right">Brasão ou Logo *</label>
                            <div class="col-md-6">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    :class="{ 'is-invalid': errors.logo }"
                                    @change="loadImage($event)">

                                    <alert-input-component v-if="errors.logo" alert="danger" :text="errors.logo[0]" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            cnpj: '',
            nome: '',
            endereco: '',
            bairro: '',
            uf: '',
            cidade: '',
            tel: '',
            cel: '',
            email: '',
            site: '',
            logo: [],
            errors: [],
            success: [],
            states: [],
            cities: [],
            idState: '',
            modalShow: true
        }
    },
    mounted() {
        this.loadData(),
        this.loadStates() 
    },
    methods: {
        loadData()
        {
            console.log(this.id)
            axios.get('/api/instituicao/1')
            .then(response => {
                this.cnpj = response.data.cnpj,
                this.nome = response.data.nome,
                this.endereco = response.data.endereco,
                this.bairro = response.data.bairro,
                this.uf = response.data.uf,
                this.cidade = response.data.cidade,
                this.tel = response.data.tel,
                this.cel = response.data.cel,
                this.email = response.data.email,
                this.site = response.data.site
            }).catch(error => [
                console.log(error.response)
            ])
        },
        async edit() {
            let formData = new FormData()
            formData.append('cnpj', this.cnpj)
            formData.append('nome', this.nome)
            formData.append('endereco', this.endereco)
            formData.append('bairro', this.bairro)
            formData.append('uf', this.uf)
            formData.append('cidade', this.cidade)
            formData.append('tel', this.tel)
            formData.append('cel', this.cel)
            formData.append('email', this.email)
            formData.append('site', this.site)
            formData.append('logo', this.logo)
            let config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Accept': 'application/json'
                }
            }
            await axios.put('/api/instituicao/1', formData, config)
                .then(response => {
                    this.modalShow = false
                    console.log(response)
                }).catch(error => {
                    this.errors = ''
                    this.errors = error.response.data  
                })
        },
        loadStates() {
            axios.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')
                .then(response => {
                    this.states = response.data
                }).catch(error => { })
        },
        loadCities(e) {
            this.idState = e.target.value
            this.cidade = ''
            axios.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + this.idState + '/municipios')
                .then(response => {
                    this.cities = response.data
                })
        },
        loadImage(e) {
            this.logo = e.target.files[0]
        }
    }
}
</script>