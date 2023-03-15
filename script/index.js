const hoverable_women = document.querySelector('.hoverable_women');
const target_women = document.querySelector('.target_women');
const elements_women = document.querySelectorAll('.elements_women');

let hover_element = "";

for(let i = 0; i < elements_women.length; i++) {
    elements_women[i].addEventListener('mouseover', () => {
        target_women.style.display = 'flex';
        target_women.style.justifyContent = 'space-around';
        hover_element = "women";
    });
    elements_women[i].addEventListener('mouseout', () => {
        target_women.style.display = 'none';
    });
}

hoverable_women.addEventListener('mouseover', () => {
    target_women.style.display = 'flex';
    target_women.style.justifyContent = 'space-around';
});

const hoverable_men = document.querySelector('.hoverable_men');
const target_men = document.querySelector('.target_men');
const elements_men = document.querySelectorAll('.elements_men');

for(let i = 0; i < elements_men.length; i++) {
    elements_men[i].addEventListener('mouseover', () => {
        target_men.style.display = 'flex';
        target_men.style.justifyContent = 'space-around';
        hover_element = "men";
    });
    elements_men[i].addEventListener('mouseout', () => {
        target_men.style.display = 'none';
    });
}

hoverable_men.addEventListener('mouseover', () => {
    target_men.style.display = 'flex';
    target_men.style.justifyContent = 'space-around';
});


const hoverable_kids = document.querySelector('.hoverable_kids');
const target_kids = document.querySelector('.target_kids');
const elements_kids = document.querySelectorAll('.elements_kids');

for(let i = 0; i < elements_kids.length; i++) {
    elements_kids[i].addEventListener('mouseover', () => {
        target_kids.style.display = 'flex';
        target_kids.style.justifyContent = 'space-around';
        hover_element = "kids";
    });
    elements_kids[i].addEventListener('mouseout', () => {
        target_kids.style.display = 'none';
    });
}

hoverable_kids.addEventListener('mouseover', () => {
    target_kids.style.display = 'flex';
    target_kids.style.justifyContent = 'space-around';
});

const search_mobil = document.querySelector('.search_mobil');
const search_div = document.querySelector('.search_div');
const delete_button = document.querySelector('.btn-close');

delete_button.addEventListener('click', () => {
    search_mobil.style.display = 'inline-block';
    search_div.style.display = 'none'
})

search_mobil.addEventListener('click', () => {
    search_mobil.style.display = 'none';
    search_div.style.display = 'block';
});

search_div.addEventListener('mouseover', () => {
    if(hover_element == "men"){
        target_men.style.display = 'flex';
        target_men.style.justifyContent = 'space-around';
    }else if(hover_element == "women"){
        target_women.style.display = 'flex';
        target_women.style.justifyContent = 'space-around';
    }else if(hover_element == "kids"){
        target_kids.style.display = 'flex';
        target_kids.style.justifyContent = 'space-around';
    }
});

search_div.addEventListener('mouseout', () => {
    if(hover_element == "men"){
        target_men.style.display = 'none';
    }else if(hover_element == "women"){
        target_women.style.display = 'none';
    }else if(hover_element == "kids"){
        target_kids.style.display = 'none';
    }
    //hover_element = "";
});


const toggler_button = document.querySelector('.navbar-toggler');

toggler_button.addEventListener('click', () => {
    hover_element = "";
    if(window.getComputedStyle(search_div).getPropertyValue('display') == 'none'){
        search_div.style.display = 'block';
    }else{
        search_div.style.display = 'none';
    }
});
