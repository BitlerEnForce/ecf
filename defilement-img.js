const items = document.querySelectorAll('img');
const nbSlide = items.length;
const suivant = document.querySelector('.right');
const precedent = document.querySelector('.left');
let count = 0;

function slideSuivante(){
    items[count].classList.remove('active');

    if(count < nbSlide - 1){
        count++;
    } else {
        count = 0;
    }

    items[count].classList.add('active')
    console.log(count);
    
}
suivant.addEventListener('click', slideSuivante)


function slidePrecedente(){
    items[count].classList.remove('active');

    if(count > 0){
        count--;
    } else {
        count = nbSlide - 1;
    }

    items[count].classList.add('active')
    // console.log(count);
    
}
precedent.addEventListener('click', slidePrecedente)

//----------------------2--------------------//
/*
const items2 = document.querySelectorAll('.contenu-global2 img');
const nbSlide2 = items2.length;
const suivant2 = document.querySelector('.right2');
const precedent2 = document.querySelector('.left2');
let count2 = 0;

function slideSuivante2(){
    items2[count2].classList.remove('active2');

    if(count2 < nbSlide2 - 1){
        count2++;
    } else {
        count2 = 0;
    }

    items2[count2].classList.add('active2')
    console.log(count2);
    
}
suivant2.addEventListener('click', slideSuivante2)


function slidePrecedente2(){
    items2[count2].classList.remove('active2');

    if(count2 > 0){
        count2--;
    } else {
        count2 = nbSlide2 - 1;
    }

    items2[count2].classList.add('active2')
    // console.log(count);
    
}

precedent2.addEventListener('click', slidePrecedente2)


*/