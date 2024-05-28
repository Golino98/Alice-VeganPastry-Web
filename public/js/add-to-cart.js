

const _SUCCESS = 'alert-success';
const _WARNING = 'alert-warning';
const _DANGER = 'alert-danger';



var currentAlert = null; // Variabile per tracciare l'alert corrente

function showAlert(alertType, sweetId, message) {
    // Rimuovi l'alert corrente se presente
    if (currentAlert) {
        currentAlert.remove();
    }

    var alertPlaceholder = document.getElementById('liveAlertPlaceholder'.concat(sweetId));
    var wrapper = document.createElement('div');
    wrapper.innerHTML = [
        `<p></p><div class="alert ${alertType} alert-dismissible custom-fade show" id="info" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('');
    alertPlaceholder.append(wrapper);

    currentAlert = wrapper; // Aggiorna l'alert corrente

    // Rimuovi l'alert dopo un intervallo di tempo
    setTimeout(function() {
        wrapper.classList.remove('show');
        setTimeout(function() {
            wrapper.remove();
            currentAlert = null; // Resettare l'alert corrente
        }, 500); // Tempo di attesa per l'animazione in millisecondi
    }, 5000); // Tempo di visualizzazione dell'alert in millisecondi
}



function addAdmin(event, sweetId) {

        showAlert(_SUCCESS, "Account registrato correttamente" );
   
}