import Vue from 'vue';
import adminComponents from './components/Admin';
import creditRequestComponents from './components/CreditRequest';
import Front from './components/Front';
import Echo from 'laravel-echo'

window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: 'us2',
    encrypted: true
});

const components = adminComponents.concat(creditRequestComponents).concat(Front);

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


