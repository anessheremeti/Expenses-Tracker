const firstText = document.querySelector(".first_item");
const data = document.querySelector(".how_secure");
const secondListItem = document.querySelector(".is_there_a_free_version");
const secondText = document.querySelector(".second_item");
const thirdListItem = document.querySelector(".can_i_export_my_reports");
const thirdText = document.querySelector(".third_item");
const closeButton = document.querySelector('.close_button');
const burgerButton = document.querySelector('.burger_menu');
const sideBar = document.querySelector('.sidebar_item_container');
const slider = document.querySelector('.slider');
let currentIndex = 0;

//Pjesa e sliderit 
function autoSlide() {
    const slides = slider.children;
    const slideWidth = slides[0].clientWidth;

    // Lëviz slider-in në slide-in e radhës
    currentIndex = (currentIndex + 1) % slides.length;
    slider.scrollTo({
        left: currentIndex * slideWidth,
        behavior: 'smooth'
    });
}

// Nise lëvizjen automatike
setInterval(autoSlide, 3000); // Ndryshim çdo 3 sekonda



function onChangeHandler(e) {
    if (e.style.display == 'none') {
        e.style.display = 'block';
        isClicked = !isClicked;
        return;
    } else {
        e.style.display = 'none';
        isClicked = !isClicked;

        return;
    }
}

data.addEventListener('click', () => {
        onChangeHandler(firstText)


        //if (firstItem.style.display == 'none') {
        //  firstItem.style.display = 'block';
        //} else {
        //  firstItem.style.display = ' none';
        //}
    })
    //This is the second event for the secondth item of the list in FAQ
secondListItem.addEventListener('click', () => {
    onChangeHandler(secondText);
})
thirdListItem.addEventListener('click', () => {
    onChangeHandler(thirdText);
})

function onCloseButton(e) {
    if (e.style.display === 'none') {
        e.style.display = 'block';
    } else {
        e.style.display = 'none'
    }
}
closeButton.addEventListener('click', () => {
    onCloseButton(sideBar)
})


function onClickHandler(e) {
    if (e.style.display == 'none') {
        e.style.display = 'block';
        isClicked = !isClicked;
        return;
    } else {
        e.style.display = 'none';

        return;
    }
}
burgerButton.addEventListener('click', () => {
    onClickHandler(sideBar)
})