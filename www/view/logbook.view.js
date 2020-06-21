$(document).ready(function() {
    $('.select2').select2();
});

function dateShift(mode, shift) {
    let date = new Date(document.getElementById('date-picker').value);
    const mSeconds = date.getTime();
    switch (mode) {
        case 'd':
            date.setTime(mSeconds + 86400000 * shift);
            break;
        case 'm':
            date.setMonth(date.getMonth() + shift);
            break;
        default:
            break;
    }
    let mm = date.getMonth() + 1;
    let dd = date.getDate();
    const yy = date.getFullYear();
    if (mm < 10) { mm = '0' + mm.toString(); }
    if (dd < 10) { dd = '0' + dd.toString(); }
    document.getElementById('date-picker').value = yy + '-' + mm + '-' + dd;
}

function sendForm() {
    document.getElementById('select-form').submit();
}

document.getElementById('date-picker').onchange = function() {
    sendForm();
};

document.getElementById('oaci-select').onchange = function() {
    sendForm();
};

document.getElementById('sbwd').onclick = function() {
    dateShift('d', -1);
    sendForm();
};

document.getElementById('sfwd').onclick = function() {
    dateShift('d', 1);
    sendForm();
};

document.getElementById('bwd').onclick = function() {
    dateShift('d', -7);
    sendForm();
};

document.getElementById('fwd').onclick = function() {
    dateShift('d', 7);
    sendForm();
};

document.getElementById('fbwd').onclick = function() {
    dateShift('m', -1);
    sendForm();
};

document.getElementById('ffwd').onclick = function() {
    dateShift('m', 1);
    sendForm();
};
