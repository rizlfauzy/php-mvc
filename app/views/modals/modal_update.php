<div class="modal_box" id="modal_update" onclick="">
  <span class="modal_close" title="Close Modal" onclick="document.querySelector('#modal_update').style.display = 'none'">x</span>
  <div class="modal_content">
    <div class="modal_container">
      <div class="modal_header mb-3">Ubah Data</div>
      <hr className="border-b-2 border-primary-bg mb-3">
      <div class="modal_body mt-5">
        <form action="<?= BASE_URL; ?>/mahasiswa/update" class="form_update" method="post">
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
            <div class="input_group pop_up_wrapper">
              <input type="text" class="form_control_search" name="edit_jurusan" id="edit_jurusan" placeholder=" ">
              <label for="edit_jurusan" class="place_label">Jurusan</label>
              <button type="button" class="card_btn_pass btn_dropdown">
                <i class="bi bi-caret-up"></i>
              </button>
              <div class="pop_up on_hidden">
                <div class="pop_up_header">
                  <div class="pop_up_title">Hasil Pencarian</div>
                </div>
                <div class="pop_up_body">
                  <ul class="bg-white rounded-lg border border-gray-200 text-tertiary-text" id="edit_list_jurusan">
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <button class="btn btn_primary w-full" type="submit">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>