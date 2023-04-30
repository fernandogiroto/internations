require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue';

// Pages
Vue.component('app-page', require('./pages/AppPage.vue').default);
Vue.component('login-page', require('./pages/LoginPage.vue').default);

//Componentes
Vue.component('banner-component', require('./components/BannerComponent.vue').default);
Vue.component('users-list-component', require('./components/UsersListComponent.vue').default);
Vue.component('groups-list-component', require('./components/GroupsListComponent.vue').default);
Vue.component('create-user-component', require('./components/CreateUserComponent.vue').default);
Vue.component('create-group-component', require('./components/CreateGroupComponent.vue').default);
Vue.component('join-group-component', require('./components/JoinGroupComponent.vue').default);
Vue.component('edit-group-component', require('./components/EditGroupComponent.vue').default);

const app = new Vue({ el: '#app' });
