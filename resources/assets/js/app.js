/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'

Vue.filter(
    'formatDate',
    function (value) {
        if (value) {
            return window.moment(String(value)).format('DD/MM/YYYY h:mm:ss A');
        }
    });


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.Event = new class {

    constructor() {
        this.vue = new Vue();
    }

    fire(event, data = null) {
        this.vue.$emit(event, data);
    }

    listen(event, callback) {
        this.vue.$on(event, callback);
    }

}

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(
    'online-users',
    require('./components/OnlineUsers.vue')
);

Vue.component(
    'chat-app',
    require('./components/ChatApp.vue')
);

const app = new Vue({
    data: {
        messages: [],
        users: []
    },

    el: '#app',

    methods: {
        addUser(user) {
            this.users.push(user);

            window.axios.post('/chat/users', user).then(response => {
            }).catch(function (error) {
                console.log(error);
            });
        },

        deleteUser() {
            window.axios.delete('/chat/users', user).then(response => {
            }).catch(function (error) {
                console.log(error);
            });

            this.users.pop(user);
        }
    }
});

window.Echo.join('chat')
    .here((e) => {
        app.addUser(e);
    })
    .joining((e) => {
        swal({
            title: "Notice",
            text: e.name + ' joined the chatroom.',
            type: "info",
            timer: 5000,
            allowEscapeKey: true,
            allowOutsideClick: true,
            customClass: 'swal-custom'
        });
    })
    .leaving((e) => {
        app.deleteUser();

        swal({
            title: "Notice",
            text: e.name + ' lefted the chatroom.',
            type: "info",
            type: "info",
            timer: 5000,
            allowEscapeKey: true,
            allowOutsideClick: true,
            customClass: 'swal-custom'
        });
    })
    .listen('MessageSent', (e) => {
        this.messages.push({
            message: e.message.message,
            user: e.user
        });
    })
    .listen('UserAdded', (e) => {
        this.users.push({
            user: e.user
            //'name', 'email', 'join_time'

        });
    })
    .listen('UserDeleted', (e) => {
        e.name + ' user deleted.';
    });
