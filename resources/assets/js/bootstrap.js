import Echo from "laravel-echo"
import moment from 'moment'
import SweetAlert from 'sweetalert'
import VueStash from 'vue-stash'

/**
 import Meta from 'vue-meta'
 import VueViewports from 'vue-viewports'
 */

/**
 * Pusher include due to breaking change before 30-April by library upstream owners
 */
window.Pusher = require('pusher-js');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

    next();
});

Vue.use(VueStash)

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
