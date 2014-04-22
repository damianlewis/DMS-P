var lastTimeslot = 21;
var now = new Date().getHours();

min = (now < lastTimeslot) ? 1 : 2;

$('.datepicker').pickadate({
    today: '',
    clear: 'Clear selection',
    formatSubmit: 'yyyy/mm/dd',
    hiddenName: true,
    min: min
})
