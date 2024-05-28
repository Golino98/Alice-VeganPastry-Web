

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

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const sweetId = this.dataset.sweetId;
            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert('alert-success', sweetId, 'Prodotto aggiunto al carrello!');
                } else {
                    showAlert('alert-danger', sweetId, 'Errore durante l\'aggiunta al carrello.');
                }
            })
            .catch(error => {
                console.error('Errore:', error);
                showAlert('alert-danger', sweetId, 'Errore durante l\'aggiunta al carrello.');
            });
        });
    });
});

function showAlert(alertType, sweetId, message) {
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder' + sweetId);
    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
        <div class="alert ${alertType} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    alertPlaceholder.append(wrapper);

    setTimeout(() => {
        wrapper.classList.remove('show');
        setTimeout(() => wrapper.remove(), 500);
    }, 5000);
}
