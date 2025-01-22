const alert_messages = document.getElementById("alert-messages");

window.onload = () => {
    if(alert_messages) {
        setTimeout(function() {
            alert_messages.classList.add('fade');
            alert_messages.style.display = 'none';
        }, 5000);
    }
};