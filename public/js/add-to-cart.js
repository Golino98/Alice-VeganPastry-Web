function addToCart(logged, id) {
    if (!logged) 
    {
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder'.concat(id))
        var test = document.getElementById('warning'.concat(id))
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-danger alert-dismissible fade show" id="warning" role="alert">`,
            `   <div>Prima di poter aggiungere al carrello devi essere loggato!</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')
        alertPlaceholder.append(wrapper)
    }
    else 
    {
        session_start();
        // Inserire il codice per l'aggiunta a carrello
        let order ={sweetId: id, quantity: document.getElementById('valueSweets'.concat(id)).value};
        if (isset($_SESSION['order'])) 
        {
            $_SESSION['order'].push(order);

        }else
        {
            $_SESSION['order'] = array();
            $_SESSION['order'].push(order);
        }
    }
}