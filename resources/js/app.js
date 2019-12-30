/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from "vue";
import Routes from "./router";
import App from "./components/App";
import PaginateComponent from "./components/layout/PaginateComponent";
import VueLoading from 'vuejs-loading-plugin'
import VueFilterDateFormat from 'vue-filter-date-format';
//https://github.com/eduardnikolenko/vue-filter-date-parse
import VueFilterDateParse from 'vue-filter-date-parse'
//https://f3oall.github.io/awesome-notifications/docs/customization/
import VueAWN from "vue-awesome-notifications"

// overwrite defaults
Vue.use(VueLoading, {
    dark: false, // default false
    text: 'Carregando dados...', // default 'Loading'
    loading: false, // default false
    //customLoader: myVueComponent, // replaces the spinner and text with your own
    //background: 'rgb(47, 64, 80)', // set custom background
    classes: ['loading-screen-inspinia', 'animated', 'fadeIn'] // array, object or string
});

//https://www.npmjs.com/package/vue-filter-date-format
Vue.use(VueFilterDateFormat, {
    dayOfWeekNames: [
        'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'
    ],
    dayOfWeekNamesNamesShort: [
        'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'
    ],
    monthNames: [
        'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
    ],
    monthNamesShort: [
        'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
        'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
    ]
});

Vue.use(VueFilterDateParse);

Vue.component('paginate-component', PaginateComponent);

let optionsVueAWN = {
    position: "top-right",
    clean: true,
    labels: {
        tip: '',
        info: '',
        success: '',
        warning: '',
        alert: '',
        async: 'Loading',
        confirm: 'Confirmation required',
    },
    icons: {
        enabled: false,
    }
    //durations: {success: 0}
};

Vue.use(VueAWN, optionsVueAWN);

Vue.filter('capitalize', function (value) {
    if (!value) return '';
    value = value.toString();
    return value.charAt(0).toUpperCase() + value.slice(1) + '.....';
});

Vue.filter('currencydecimal', function (value) {
    if (!value) return '-';
    return value.toFixed(2)
});

Vue.filter('fromBoolean', function (value) {
    if (!value) return '-';
    return value == 1 ? 'Sim' : 'Não';
});

const app = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(App)
});
