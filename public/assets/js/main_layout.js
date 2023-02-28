const modal_insert = document.querySelector("#modal_insert"),
  modal_update = document.querySelector("#modal_update");

modal_insert && modal_insert.addEventListener('click',function (e){
  e.target.id === "modal_insert" ? (this.style.display = "none") : "";
})

modal_update && modal_update.addEventListener('click',function (e){
  e.target.id === "modal_update" ? (this.style.display = "none") : "";
})
