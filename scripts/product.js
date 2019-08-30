let buttonEl = document.querySelector('button');

buttonEl.addEventListener('click', function(){
    let id = this.getAttribute('data-id');
    
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/handlers/basketHandler.php?id=${id}`);
    xhr.send();

    xhr.addEventListener('load', ()=>{
        let countProducts = xhr.responseText;
        let countBasketEl = document.querySelector('.user-basket__basket__count');

        countBasketEl.innerText = countProducts;
        // console.log( xhr.responseText );
    });
});