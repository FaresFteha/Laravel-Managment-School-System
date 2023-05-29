/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

var channel = Echo.private(`App.Models.User.${userId}`);
channel.notification(function (data) {
    $('#listNotification').prepend(`<a href="${data.url}?notify_id=${data.id}"
    class="dropdown-item">${data.title} ${data.Fees}<small
        class="float-right text-muted time">${data.date}</small>
</a>`);
    let count = Number($('#newNotification').text());
    count++;
    if (count == 99) {
        count == '99+';
    }
    $('#newNotification').text(count);
});
