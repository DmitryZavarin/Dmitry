class Catalog{
    constructor(){
        this.el = document.querySelector('.catalog');
        this.id = this.el.getAttribute('data-catalog-id');
        this.products = [];
    }
    load(numPage = 1){
        this.preloaderStart();

        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/catalogHandler.php?id=${this.id}&nowPage=${numPage}`);
        xhr.send();
        // this.preloadStart();
        xhr.addEventListener('load', ()=>{
            this.clearAll();

            let data = JSON.parse(xhr.responseText);
            console.log(data);
            data.products.forEach((product)=>{
                this.products.push( new Product(product) );
            });
            // this.preloadStop();
            
            this.renderProducts();
            this.renderPagination(data.pagination);
            this.preloaderStop();
        });
    }
    renderPagination(pagination){
        let catalogPaginationEl = this.el.querySelector('.catalog-pagination');
        for(let i = 1; i <= pagination.countPage; i++){
            let paginationItemEl = document.createElement('div');
            paginationItemEl.classList.add('catalog-pagination-item');

            if( i == pagination.nowPage){
                paginationItemEl.classList.add('active');
            }

            paginationItemEl.innerText = i;
            paginationItemEl.setAttribute('data-num-page', i);

            let that = this;
            paginationItemEl.addEventListener('click', function(){
                let numPage = this.getAttribute('data-num-page'); 
                that.load(numPage);
            });

            /* */
            // paginationItemEl.addEventListener('click', (e)=>{
            //     let numPage = e.target.getAttribute('data-num-page'); 
            //     that.load(numPage);
            // });


            catalogPaginationEl.appendChild(paginationItemEl);
        }
    }
    renderProducts(){
        this.products.forEach((product)=>{
            this.el.querySelector('.catalog-products').appendChild( product.getElement() );
        })
    }
    clearAll(){
        this.el.querySelector('.catalog-products').innerHTML = '';
        this.el.querySelector('.catalog-pagination').innerHTML = '';
        this.products = [];
    }
    preloaderStart(){
        this.el.querySelector('.catalog-preloader').style.display = 'flex';
    }
    preloaderStop(){
        this.el.querySelector('.catalog-preloader').style.display = 'none';
    }

    // https://bit.ly/2Z1fESd
}  

class Product{
    constructor(product){
        this.id = product.id;
        this.name = product.name;
        this.pic = product.pic;
        this.price = product.price;
        this.text = product.text;
        this.sku = product.sku;

        this.el = document.createElement('a');
        this.el.classList.add('catalog-products-item');
        this.el.href = `/product.php?id=${this.id}`;
    }
    getElement(){
        this.el.innerHTML = `
            <div class='catalog-products-item-pic' style='background-image: url(${this.pic})'></div>
            <div class='catalog-products-item-name'>${this.name}</div>
            <div class='catalog-products-item-price'>${this.price} руб.</div>
        `;

        return this.el;
    }

}

let catalog = new Catalog();
console.log(catalog);
catalog.load();