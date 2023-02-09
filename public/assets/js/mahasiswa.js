const form_insert = document.querySelector(".form_insert"),
  input_jurusan = document.querySelector("#jurusan"),
  pop_up = document.querySelector(".pop_up"),
  btn_dropdown = document.querySelector(".btn_dropdown");

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

btn_dropdown.addEventListener("click", function (e) {
  if (pop_up.classList.contains("on_hidden")) {
    addClass(pop_up, "on_pop");
    removeClass(pop_up, "on_hidden");
    addClass(btn_dropdown, "clicked");
  } else {
    addClass(pop_up, "on_hidden");
    removeClass(pop_up, "on_pop");
    removeClass(btn_dropdown, "clicked");
  }
});

input_jurusan.addEventListener("input", async function (e) {
  const value = this.value;
  if (value.length < 1) {
    addClass(pop_up, "on_hidden");
    removeClass(pop_up, "on_pop");
    removeClass(btn_dropdown, "clicked");
    return;
  }
  addClass(pop_up, "on_pop");
  removeClass(pop_up, "on_hidden");
  addClass(btn_dropdown, "clicked");
  try {
    const {
      error: error_jurusan,
      message: message_jurusan,
      data: data_jurusan,
    } = await get_data({ url: url + "/mahasiswa/get_jurusan_by_name/"+value });
    if (error_jurusan) throw new Error(message_jurusan);
    console.log(data_jurusan);
  } catch (e) {
    alert(e.message);
  }
});
