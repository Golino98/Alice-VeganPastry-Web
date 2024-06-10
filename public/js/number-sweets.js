function decrease(id) {
    var value = parseInt(document.getElementById("quantity".concat(id)).value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    if (value < 0) {
        document.getElementById("quantity".concat(id)).value = 0;
    }else{
        document.getElementById("quantity".concat(id)).value = value;
    }
}

function increase(id) {
    var value = parseInt(document.getElementById("quantity".concat(id)).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    if (value >= 20) {
        document.getElementById("quantity".concat(id)).value = 20;
    }else{
        document.getElementById("quantity".concat(id)).value = value;
    }
}

function filterSweets() {
    var searchTerm = document.getElementById("searchTerm").value.toLowerCase();
    var sweets = document.getElementsByClassName("reflow-product");

    // Cicla attraverso tutti i dolci
    for (var i = 0; i < sweets.length; i++) {
        var sweetName = sweets[i].getElementsByClassName("ref-name")[0].innerText.toLowerCase();

        // Verifica se il nome del dolce contiene il termine di ricerca
        if (sweetName.includes(searchTerm)) {
            // Mostra il dolce
            sweets[i].classList.remove("hidden");
        } else {
            // Nascondi il dolce
            sweets[i].classList.add("hidden");
        }
    }
}
