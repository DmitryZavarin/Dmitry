class Person{
    constructor(name, age, img){
        this.name = name;
        this.age = age;
        this.img = img;

        this.el = document.createElement('div');
        this.el.classList.add('person');
    }
    render(){
        this.el.innerHTML = `
            <div class='person-name'>${this.name}</div>
            <div class='person-age'>${this.age}</div>
            <img src='${this.img}'>
        `;

        this.el.addEventListener('click', ()=>{
            alert(`Привет, меня зовут ${this.name}`);
        });
        
        document.body.appendChild(this.el);
    }
}

let vasya = new Person('Вася', 44, 'https://vkpeople.ru/_/%D0%92%D0%B0%D1%81%D0%B8%D0%BB%D0%B8%D0%B9-%D0%A3%D1%82%D0%BA%D0%B8%D0%BD-%D1%84%D0%BE%D1%82%D0%BE?pp.userapi.com/c631322/v631322735/21739/Lek6d97TLhU.jpg');
vasya.render();

let petya = new Person('Петя', 20, 'https://actionlist.ru/img/event/27878.jpg');
petya.render();
console.log(vasya);