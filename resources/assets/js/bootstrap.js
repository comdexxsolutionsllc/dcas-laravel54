import Echo from "laravel-echo"
import Meta from 'vue-meta'
import moment from 'moment'
import Vuex from 'vuex'
import VueViewports from 'vue-viewports'


// window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// window.$ = window.jQuery = require('jquery');
// require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

Vue.use(Vuex)
// Vue.use(VueViewports, { 420: 'mobile', 768: 'tablet', 1024: 'desktop', 1920: 'hd-desktop', 2560: 'qhd-desktop', 3840: 'uhd-desktop' })

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

    next();
});


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

window.moment = moment;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '891846d40fb294f5555e',
    encrypted: true
});

window.Echo.private('chat')
    .listen('MessageSent', (e) => {
        this.messages.push({
            message: e.message.message,
            user: e.user
        });
    });