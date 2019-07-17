
import Vue from 'vue';
import adminComponents from './components/Admin';
import creditRequestComponents from './components/CreditRequest';

const components =adminComponents.concat(creditRequestComponents);

components.forEach(component => {
    Vue.component(component.name, component);
});

new Vue({el: '#app',});


import contact from './Modal';
import nav from './nav';
nav();
contact();
import swal from 'sweetalert';
const alertMessage = document.querySelector('#alertMessage');
if (alertMessage) {
    const message = alertMessage.dataset.message,
        secondMessage = alertMessage.dataset.secondmessage,
        typeMessage = alertMessage.dataset.typemessage;
    swal(message, secondMessage, typeMessage);
}

