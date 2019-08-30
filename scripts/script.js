let xhr = new XMLHttpRequest();
xhr.open('GET', `/handlers/basketHandler.php`);
xhr.send();

xhr.addEventListener('load', ()=>{
    let countProducts = xhr.responseText;
    let countBasketEl = document.querySelector('.user-basket__basket__count');

    countBasketEl.innerText = countProducts;
    // console.log( xhr.responseText );
});