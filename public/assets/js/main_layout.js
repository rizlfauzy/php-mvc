const modal_insert = document.querySelector("#modal_insert");

modal_insert && modal_insert.addEventListener('click',function (e){
  e.target.id === "modal_insert" ? (this.style.display = "none") : "";
})