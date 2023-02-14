const form_insert = document.querySelector(".form_insert"),
  input_jurusan = document.querySelector("#jurusan"),
  pop_up = document.querySelector(".pop_up"),
  btn_dropdown = document.querySelector(".btn_dropdown"),
  list_jurusan = document.querySelector("#list_jurusan");

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
    list_jurusan.innerHTML = data_jurusan.length > 0 ? data_jurusan.map(item=>{
      return /*html*/`
        <li class="px-6 py-2 w-full cursor-pointer hover:bg-secondary-bg hover:text-white rounded-t-lg jurusan">${item.jurusan}</li>
      `
    }).join(" ") : /*html*/`
      <li class="px-6 py-2 w-full cursor-pointer hover:bg-secondary-bg hover:text-white rounded-t-lg">Jurusan tidak ditemukan</li>
    `;
  } catch (e) {
    alert(e.message);
  }
});

list_jurusan.addEventListener("click",function (e) {  
  if (e.target.classList.contains("jurusan")) {
    input_jurusan.value = e.target.innerHTML
  }
})