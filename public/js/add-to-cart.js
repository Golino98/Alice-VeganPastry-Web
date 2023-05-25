function addToCart(logged, id) {
    if (!logged) 
    {
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder'.concat(id))
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-danger alert-dismissible fade show" id="warning" role="alert">`,
            `   <div>Prima di poter aggiungere al carrello devi essere loggato!</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')
        alertPlaceholder.append(wrapper)
    }else
    {
        var value = parseInt(document.getElementById("valueSweets".concat(id)).value, 10);
        value = isNaN(value) ? 0 : value;
        if(value <= 0)
        {
            const alertPlaceholder = document.getElementById('liveAlertPlaceholder'.concat(id))
            const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-info alert-dismissible fade show" id="info" role="alert">`,
            `   <div>Devi selezionare almeno una unità del dolce prima di poterlo aggiungere al carrello.</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')
        alertPlaceholder.append(wrapper)
        }
    }
}