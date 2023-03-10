const hoverable_women = document.querySelector('.hoverable_women');
const target_women = document.querySelector('.target_women');
const elements_women = document.querySelectorAll('.elements_women');

for(let i = 0; i < elements_women.length; i++) {
    elements_women[i].addEventListener('mouseover', () => {
        target_women.style.display = 'flex';
        target_women.style.justifyContent = 'space-around';
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
    });
    elements_kids[i].addEventListener('mouseout', () => {
        target_kids.style.display = 'none';
    });
}

hoverable_kids.addEventListener('mouseover', () => {
    target_kids.style.display = 'flex';
    target_kids.style.justifyContent = 'space-around';
});