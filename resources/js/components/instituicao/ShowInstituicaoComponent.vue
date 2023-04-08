<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <figure class="figure">
                        <img :src="pathLogo" class="figure-img img-fluid rounded" alt="...">
                    </figure>
                </div>
                <div class="col-md-9">
                    <h5 class="card-title text-uppercase">{{ instituicao.nome }}</h5>
                    <p class="card-text">CNPJ: {{ instituicao.cnpj }}</p>
                    <p class="card-text">Endereço: {{ instituicao.endereco + ', ' + instituicao.bairro + ', ' + instituicao.cidade + ' - ' + instituicao.uf }}</p>
                    <p class="card-text">Telefone: {{ instituicao.tel }}</p>
                    <p class="card-text">Celular: (whatsApp): {{ instituicao.cel }}</p>
                    <p class="card-text">Email: {{ instituicao.email }}</p>
                    <p class="card-text">Site: {{ instituicao.site }}</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#editInstituicao"><i class="fas fa-edit"></i> Editar dados da Instituição</a>
                </div>
            </div>
        </div>
    </div>
    <edit-instituicao-component/>
</template>
<script>
import axios from 'axios'

export default {
    data() {
        return {
            instituicao: '',
            pathLogo : ''
        }

    },
    mounted() {
        this.show()
    },
    methods: {
        async show() {
            axios.get('/api/instituicao/1')
                .then(response => {
                    this.instituicao = response.data
                    this.pathLogo = '/storage/' + this.instituicao.logo
                }).catch(error => {
                    console.log(error.response.data)
                })
        }
    }
}
</script>
