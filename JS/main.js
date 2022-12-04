const input = document.querySelector('input');
const counter = document.querySelector('label span');
const maxLength = input.getAttribute('maxlength');


const textarea = document.querySelector('textarea');
const counterTextarea = document.getElementById('textarea');
const maxLengthTextarea = textarea.getAttribute('maxlength');

input.addEventListener('input', event => {

    const valueLength = event.target.value.length;
    const leftCharLength = maxLength - valueLength;

    if (leftCharLength < 0) return;
    counter.innerText = leftCharLength;
})

textarea.addEventListener('input', event => {

    const valueLength = event.target.value.length;
    const leftCharLength = maxLengthTextarea - valueLength;

    if (leftCharLength < 0) return;
    counterTextarea.innerText = leftCharLength;
})