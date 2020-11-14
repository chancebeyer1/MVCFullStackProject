
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {
    var quantityInputs = document.getElementsByClassName('quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var QInput = quantityInputs[i];
        QInput.addEventListener('change', quantityChanged);
    }

    var novaPlanInputs = document.getElementsByClassName('novaPlan');
    for (var i = 0; i < novaPlanInputs.length; i++) {
        var NPInput = novaPlanInputs[i];
        NPInput.addEventListener('change', novaPlanChanged);
    }

    var cloudInputs = document.getElementsByClassName('cloudStorage');
    for (var i = 0; i < cloudInputs.length; i++) {
        var CInput = cloudInputs[i];
        CInput.addEventListener('change', cloudStorageChanged);
    }

    var cloudInputsPer = document.getElementsByClassName('cloudStoragePer')[0];
    cloudInputsPer.addEventListener('change', cloudStorageChanged);


    updatePriceTotal();
}

function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updatePriceTotal();
}

function novaPlanChanged(event)
{
    updatePriceTotal();
}

function cloudStorageChanged(event)
{
    updatePriceTotal();
}

function updatePriceTotal() {
//  5 PC NOVA PRODUCT

    var novaPlan = document.getElementsByClassName('novaPlan')[0].selectedOptions[0].value;
    if (novaPlan === 'new_subscription_pricing')
    {
        var cloudStorageElement = document.getElementsByClassName('cloudStorage')[0].selectedOptions[0];
        var cloudStoragePrice = cloudStorageElement.getAttribute('data-sub');
    } else
    {
        var cloudStorageElement = document.getElementsByClassName('cloudStoragePer')[0].selectedOptions[0];
        var cloudStoragePrice = cloudStorageElement.getAttribute('data-per');
    }
    var quantity = document.getElementsByClassName('quantity')[0].value;
    var price = cloudStoragePrice * quantity;
    price = Math.round(price * 100) / 100;
    document.getElementsByClassName('price')[0].innerText = '$' + price;
    var discountElement = document.getElementsByClassName('discount')[0];
    var discount = parseFloat(discountElement.innerText.replace('-', '').replace('$', ''));
    var total = price - discount;
    if (total < 0) {
        total = 0;
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('total')[0].innerText = '$' + total;

    for (var i = 1; i < 3; i++)
    {
        var novaPlan = document.getElementsByClassName('novaPlan')[i].selectedOptions[0].value;
        var cloudStorageElement = document.getElementsByClassName('cloudStorage')[i].selectedOptions[0];
        if (novaPlan === 'new_subscription_pricing')
        {
            var cloudStoragePrice = cloudStorageElement.getAttribute('data-sub');
        } else
        {
            var cloudStoragePrice = cloudStorageElement.getAttribute('data-per');
        }
        var quantity = document.getElementsByClassName('quantity')[i].value;
        var price = cloudStoragePrice * quantity;
        price = Math.round(price * 100) / 100;
        document.getElementsByClassName('price')[i].innerText = '$' + price;
        var discountElement = document.getElementsByClassName('discount')[i].innerText;
        var discount = parseFloat(discountElement.replace('-', '').replace('$', ''));
        var total = price - discount;
        if (total < 0) {
            total = 0;
        }
        total = Math.round(total * 100) / 100;
        document.getElementsByClassName('total')[i].innerText = '$' + total;
    }
}

