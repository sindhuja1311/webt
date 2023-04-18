let totalItems = 0;
let totalCost = 0;

function addItem(cost) {
  totalItems++;
  totalCost += cost;
  document.getElementById("total-items").innerHTML = totalItems;
  document.getElementById("total-cost").innerHTML = totalCost;
}
function removeItem(cost){
  totalItems--;
  totalCost -= cost;
  document.getElementById("total-items").innerHTML = totalItems;
  document.getElementById("total-cost").innerHTML = totalCost;
}
function resetOrder() {
  totalItems = 0;
  totalCost = 0;
  document.getElementById("total-items").innerHTML = totalItems;
  document.getElementById("total-cost").innerHTML = totalCost;
}
