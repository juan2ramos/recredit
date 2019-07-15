import contact from './Modal';
import nav from './nav';
import uploadFiles from './uploadFiles';
import swal from 'sweetalert';

import Vue from 'vue';
import adminComponents from './components';
import creditRequestComponents from './components/CreditRequest';
import Autocomplete from 'vuejs-auto-complete'

const components =adminComponents.concat(creditRequestComponents);

components.forEach(component => {
    Vue.component(component.name, component);
});
Vue.component( Autocomplete);


new Vue({el: '#app',});

nav();
contact();
uploadFiles();

const alertMessage = document.querySelector('#alertMessage');
if (alertMessage) {
    const message = alertMessage.dataset.message,
        secondMessage = alertMessage.dataset.secondmessage,
        typeMessage = alertMessage.dataset.typemessage;
    swal(message, secondMessage, typeMessage);
}

