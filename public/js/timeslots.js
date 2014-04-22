var $datetime = $('#delivery-date').attr('datetime');
var deliveryDate = new Date(new Date($datetime).toDateString()).getTime();
var now = new Date(new Date().toDateString()).getTime();
var difference = deliveryDate - now;
var day = 86400000;
var disabled = (difference <= day) ? [{ from: -24, to: true }] : [];

$('.timepicker').pickatime({
    clear: 'Clear selection',
    formatSubmit: 'HH:i',
    hiddenName: true,
    interval: 60,
    min: [7,0],
    max: [21,0],
    disable: disabled
})
