function addToCart(id) {
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder'.concat(id))
      const wrapper = document.createElement('div')
      wrapper.innerHTML = [
        `<div class="alert alert-danger alert-dismissible fade show" role="alert">`,
        `   <div>Prima di poter aggiungere al carrello devi essere loggato!</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
      ].join('')
      alertPlaceholder.append(wrapper)
}