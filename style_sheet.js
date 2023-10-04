const open = document.getElementsById('open');
const modal_container = document.getElementById('modal_container');
const close = document.getElementsById('close');

open.addEventListener('click', () ==> {
    modal_container.classList.add('show');
});


open.addEventListener('click', () ==> {
    modal_container.classList.remove('show');
});