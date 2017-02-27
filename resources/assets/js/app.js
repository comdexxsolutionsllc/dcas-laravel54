/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import store from './stores/ChatStore'

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

// Vue.component('example', require('./components/Example.vue'));

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
    'chat-messages',
    require('./components/ChatMessages.vue')
);

Vue.component(
    'chat-form',
    require('./components/ChatForm.vue')
);

Vue.component(
    'user-list',
    require('./components/UserList.vue')
);

const app = new Vue({
    data: {
        messages: [],
        users: []
    },

    el: '#app',

    created() {
        this.fetchUsers();
        this.fetchMessages();
    },

    watch: {
        messages: {
            handler: function (val, oldVal) {
                this.fetchMessages();
            },
            deep: true
        }
    },

    methods: {
        fetchMessages() {
            window.axios.get('/chat/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            window.axios.post('/chat/messages', message).then(response => {
                // console.log(response.data);
            });
        },

        addUser(user) {
            this.users.push(user);
        },

        deleteUser() {
            this.users.pop();
        },

        fetchUsers() {
            this.users;
        }
    }
});

window.Echo.join('chat')
    .here((e) => {
        app.addUser(e);
    })
    .joining((e) => {
        console.log(e.name + ' joined');
    })
    .leaving((e) => {
        app.deleteUser();
        console.log(e.name + ' left');
    })
    .listen('MessageSent', (e) => {
        this.messages.push({
            message: e.message.message,
            user: e.user
        });
    });
