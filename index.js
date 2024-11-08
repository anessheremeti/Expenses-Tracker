const firstText = document.querySelector(".first_item");
const data = document.querySelector(".how_secure");
const secondListItem = document.querySelector(".is_there_a_free_version");
const secondText = document.querySelector(".second_item");
const thirdListItem = document.querySelector(".can_i_export_my_reports");
const thirdText = document.querySelector(".third_item");
//



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
secondListItem.addEventListener('click', () => {
    onChangeHandler(secondText);
})
thirdListItem.addEventListener('click', () => {
    onChangeHandler(thirdText);
})