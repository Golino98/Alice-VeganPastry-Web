const _ZEROD_TO_CART = 'Devi selezionare almeno una unità del dolce prima di poterlo aggiungere al carrello.';
const _ONE_TO_CART = 'Prodotto aggiunto al carrello.';
const _MORE_TO_CART = 'I prodotti sono stati aggiunti al carrello.';
const _MAX_TO_CART = 'Non puoi aggiungere più di 20 prodotti per volta.';

const _SUCCESS = 'alert-success';
const _WARNING = 'alert-warning';
const _DANGER = 'alert-danger';

const _ADD_TO_CART = 'addToCartForm';

const _ELEMENT = 'quantity';

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


function addToCart(event, sweetId) {
    var value = parseInt(document.getElementById(_ELEMENT.concat(sweetId)).value, 10);
    event.preventDefault(); // Previeni il comportamento predefinito del form

    if (value <= 0) {
        showAlert(_WARNING, sweetId, _ZEROD_TO_CART);
    } else if (value == 1) {
        // Esegui la richiesta AJAX
        var form = document.getElementById(_ADD_TO_CART + sweetId);
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open(form.method, form.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send(formData);

        showAlert(_SUCCESS, sweetId, _ONE_TO_CART);
        var quantityInputs = document.querySelectorAll('input[type="number"][name="quantity"]');
        quantityInputs.forEach(function(input) {
            input.value = 0;
        });
        
        
    } else if (value <= 20) {
        // Esegui la richiesta AJAX
        var form = document.getElementById(_ADD_TO_CART + sweetId);
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open(form.method, form.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send(formData);

        showAlert(_SUCCESS, sweetId, _MORE_TO_CART);
        var quantityInputs = document.querySelectorAll('input[type="number"][name="quantity"]');
        quantityInputs.forEach(function(input) {
            input.value = 0;
        });
    } else {
        showAlert(_WARNING, sweetId, _MAX_TO_CART);
    }
}


function addAdmin(event, sweetId) {
        showAlert(_SUCCESS, "Account registrato correttamente" );
}