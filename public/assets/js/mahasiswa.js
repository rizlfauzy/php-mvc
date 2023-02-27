const form_insert = document.querySelector(".form_insert"),
  input_jurusan = document.querySelector("#jurusan"),
  pop_up = document.querySelector(".pop_up"),
  btn_dropdown = document.querySelector(".btn_dropdown"),
  list_jurusan = document.querySelector("#list_jurusan"),
  tbody_mahasiswa = document.querySelector("#tbody_mahasiswa");

function templateTable(element, items) {
  element.innerHTML = items
    .map((item, i) => {
      return /*html*/ `
                    <tr class="bg-gray-100 hover:bg-gray-200 border-b last:border-0 transition duration-300 ease-in-out">
                      <td class="md:text-md text-sm leading-[1.25] py-2 px-3 text-dark text-center">
                        ${i + 1}
                      </td>
                      <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
                        ${item.name}
                      </td>
                      <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
                        <a class="link link_btn link_primary" href="${url}/mahasiswa/detail/${
                          item.id
                        }">
                          Detail
                        </a>
                        <button type="button" class="btn btn_reset btn_delete_mhs" data-id="${item.id}">
                          Delete
                        </button>
                      </td>
                    </tr>
      `;
    })
    .join("");
}

async function showListJurusan(value = "") {
  try {
    const {
      error: error_jurusan,
      message: message_jurusan,
      data: data_jurusan,
    } = await get_data({
      url: url + "/mahasiswa/get_jurusan_by_name/" + value,
    });
    if (error_jurusan) throw new Error(message_jurusan);
    list_jurusan.innerHTML =
      data_jurusan.length > 0
        ? data_jurusan
            .map((item) => {
              return /*html*/ `
        <li class="px-6 py-2 w-full cursor-pointer hover:bg-secondary-bg hover:text-white rounded-t-lg jurusan">${item.jurusan}</li>
      `;
            })
            .join(" ")
        : /*html*/ `
      <li class="px-6 py-2 w-full cursor-pointer hover:bg-secondary-bg hover:text-white rounded-t-lg">Jurusan tidak ditemukan</li>
    `;
  } catch (e) {
    // alert(e.message);
    templateAlert(e.message, "red", "Error !!!");
  }
}

form_insert.addEventListener("submit", async function (e) {
  e.preventDefault();
  try {
    const form_data = new FormData(this);
    const {
      error: error_insert,
      message: message_insert,
      data: list_mahasiswa,
    } = await post_data({
      url: url + "/mahasiswa/insert",
      method: "post",
      body: form_data,
    });
    if (error_insert) throw new Error(message_insert);
    templateTable(tbody_mahasiswa, list_mahasiswa);
    // alert(message_insert);
    templateAlert(message_insert, "green", "Success !!!");
    addClass(pop_up, "on_hidden");
    removeClass(pop_up, "on_pop");
    removeClass(btn_dropdown, "clicked");
    modal_insert.style.display = "none";
  } catch (e) {
    // alert(e.message);
    templateAlert(e.message, "red", "Error !!!");
    // console.log(e.message);
  }
});

btn_dropdown.addEventListener("click", async function (e) {
  if (pop_up.classList.contains("on_hidden")) {
    addClass(pop_up, "on_pop");
    removeClass(pop_up, "on_hidden");
    addClass(btn_dropdown, "clicked");
    await showListJurusan();
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
  await showListJurusan(value);
});

list_jurusan.addEventListener("click", function (e) {
  if (e.target.classList.contains("jurusan")) {
    input_jurusan.value = e.target.innerHTML;
    addClass(pop_up, "on_hidden");
    removeClass(pop_up, "on_pop");
    removeClass(btn_dropdown, "clicked");
  }
});

tbody_mahasiswa.addEventListener("click",async function (e) {  
  if (e.target.classList.contains("btn_delete_mhs")) {
    const result_swal = await swal.fire({
      title: "Apa Anda yakin ?",
      text: "Sekali dihapus data tidak akan bisa kembali lagi !",
      icon: "warning",
      showDenyButton: true,
      confirmButtonText: "Hapus",
      denyButtonText: `Jangan Hapus`,
    });
    if (result_swal.isDenied)
      return Swal.fire("Mahasiswa tidak dihapus", "", "info");
    try {
      const { id } = e.target.dataset;
      const {
        error: error_delete,
        message: message_delete,
        data: list_mahasiswa,
      } = await get_data({ url: url + "/mahasiswa/delete/" + id });
      if (error_delete) throw new Error(message_delete);
      Swal.fire(message_delete, "", "success");
      templateTable(tbody_mahasiswa, list_mahasiswa);
    } catch (e) {
      Swal.fire(e.message, "", "info");
    }
  }
})

