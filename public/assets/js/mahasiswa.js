const form_insert = document.querySelector(".form_insert"),
  input_jurusan = document.querySelector("#jurusan"),
  pop_up = document.querySelector(".pop_up");

form_insert.addEventListener("submit", function (e) {
  e.preventDefault();
  try {
    const form_data = new FormData(this);
    const obj_data = Object.fromEntries(form_data);
    console.log(obj_data);
  } catch (e) {
    alert(e.message);
  }
});

input_jurusan.addEventListener("input", function (e) {
  const value = this.value;
  if (value.length < 1) {
    addClass(pop_up, "on_hidden");
    removeClass(pop_up, "on_pop");
    return;
  }
  addClass(pop_up, "on_pop");
  removeClass(pop_up, "on_hidden");
});
console.log(input_jurusan)
