/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

switchTrack = function (uri, trackId, token) {
    $.post(
        `${uri}/${trackId}`,
        {
            '_token': token
        },
        function (data) {
            const oldActiveTrack = $('.active-track');
            oldActiveTrack.removeClass('active-track');
            oldActiveTrack.addClass('inactive-track')

            const newActiveTrack = $(`#track-${trackId}`);
            newActiveTrack.addClass('active-track');
            newActiveTrack.removeClass('inactive-track');

            $('.active-track .mark-track-active b').addClass('tilt-animation');
            $('.inactive-track .mark-track-active b').removeClass('tilt-animation');
    });
}

startCourse = function (courseId, token) {
    $.post(
        `/courses/start/${courseId}`,
        {
            '_token': token
        },
        function (data) {
            window.location.reload();
        });
};

completeCourse = function (courseId, token) {
    $.post(
        `/courses/complete/${courseId}`,
        {
            '_token': token
        },
        function (data) {
            window.location.reload();
        });
};
