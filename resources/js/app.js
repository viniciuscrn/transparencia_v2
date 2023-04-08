import './bootstrap';
import { createApp } from 'vue';
import VueTheMask from 'vue-the-mask'

const app = createApp({});

app.use(VueTheMask)

import ExampleComponent from './components/ExampleComponent.vue';
import ModalComponent from './components/ModalComponent.vue';
import AlertInputComponent from './components/AlertInputComponent.vue';
//USER
import IndexUserComponent from './components/user/IndexUserComponent.vue';
//INSTITUIÇÃO
import CreateInstituicaoComponent from './components/instituicao/CreateInstituicaoComponent.vue';
import ShowInstituicaoComponent from './components/instituicao/ShowInstituicaoComponent.vue';
import EditInstituicaoComponent from './components/instituicao/EditInstituicaoComponent.vue';

app.component('example-component', ExampleComponent);
app.component('modal-component', ModalComponent);
app.component('alert-input-component', AlertInputComponent);
//USER
app.component('index-user-component', IndexUserComponent);
//INSITUIÇÃO
app.component('create-instituicao-component', CreateInstituicaoComponent);
app.component('show-instituicao-component', ShowInstituicaoComponent);
app.component('edit-instituicao-component', EditInstituicaoComponent);

app.mount('#app');
