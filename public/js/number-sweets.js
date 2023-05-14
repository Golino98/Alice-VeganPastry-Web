function decrease(id) {
    var value = parseInt(document.getElementById("valueSweets".concat(id)).value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    if (value < 0) {
        document.getElementById("valueSweets".concat(id)).value = 0;
    }else{
        document.getElementById("valueSweets".concat(id)).value = value;
    }
}

function increase(id) {
    var value = parseInt(document.getElementById("valueSweets".concat(id)).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    if (value >= 20) {
        document.getElementById("valueSweets".concat(id)).value = 20;
    }else{
        document.getElementById("valueSweets".concat(id)).value = value;
    }
}