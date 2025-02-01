const closeButton = document.querySelector('.close_button');
const burgerButton = document.querySelector('.burger_menu');
const sideBar = document.querySelector('.sidebar_item_container');

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