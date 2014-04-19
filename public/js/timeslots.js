$('.timepicker').pickatime({
    clear: 'Clear selection',
    formatSubmit: 'HH:i',
    hiddenName: true,
    interval: 60,
    min: [7,0],
    max: [21,0],
    disable: [
        { from: -24, to: true }
    ]
})
