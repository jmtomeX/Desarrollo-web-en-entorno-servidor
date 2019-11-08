import Picker from 'bulma-datetime'

const el = document.querySelector("#input_fecha");
const a = new Picker(el, {
    type: "date",
    format: "YYYY-MM-DD",
    maxDate: "2022-01-01",
    minDate: "2018-01-01",
    change: function(val) {
        console.log("change");
    }
})
console.log(a.year, a.month, a.date);