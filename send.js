var data = {
    service_id: 'service_3uyknph',
    template_id: 'template_24v2iow',
    user_id: '2J8DshQnpUuUkoM9C',
};

$.ajax('https://api.emailjs.com/api/v1.0/email/send', {
    type: 'POST',
    data: JSON.stringify(data),
    contentType: 'application/json'
}).done(function () {
    alert('Your mail is sent!');
}).fail(function (error) {
    alert('Oops... ' + JSON.stringify(error));
});