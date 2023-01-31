const form_insert = document.querySelector(".form_insert");

form_insert.addEventListener("submit", function (e) {
  e.preventDefault()
  try {
    const form_data = new FormData(this);
    const obj_data = Object.fromEntries(form_data);
    console.log(obj_data);
  } catch (e) {
    alert(e.message)
  }
});
