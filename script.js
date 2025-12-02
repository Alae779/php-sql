const duree = document.querySelectorAll(".valr");
let total = 0;
duree.forEach(td => {
    total += Number(td.textContent)
})
document.querySelector("#total").textContent = total;