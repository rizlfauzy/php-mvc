<div class="modal_box" id="modal_insert" onclick="">
  <span class="modal_close" title="Close Modal" onclick="document.querySelector('#modal_insert').style.display = 'none'">x</span>
  <div class="modal_content">
    <div class="modal_container">
      <div class="modal_header mb-3">Tambah Data</div>
      <hr className="border-b-2 border-primary-bg mb-3">
      <div class="modal_body mt-5">
        <form action="<?= BASE_URL; ?>/mahasiswa/insert" class="form_insert" method="post">
          <div class="mb-3 flex items-center">
            <div class="input_group">
              <input type="text" class="form_control" name="edit_nama" id="edit_nama" placeholder=" ">
              <label for="edit_nama" class="place_label">Nama</label>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <div class="input_group">
              <input type="text" class="form_control" name="edit_nrp" id="edit_nrp" placeholder=" ">
              <label for="edit_nrp" class="place_label">NRP</label>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <div class="input_group">
              <input type="email" class="form_control" name="edit_email" id="edit_email" placeholder=" ">
              <label for="edit_email" class="place_label">Email</label>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <div class="input_group">
              <!-- <input type="text" class="form_control" name="edit_jurusan" id="edit_jurusan" placeholder=" "> -->
              <select class="form-select appearance-none
                block
                w-full
                px-[25px]
                py-[15px]
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-secondary-bg
                rounded-[.75rem]
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                <!-- <option selected>Open this select menu</option> -->
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <label for="edit_jurusan" class="place_label form-label select-label">Jurusan</label>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <button class="btn btn_primary w-full" type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>