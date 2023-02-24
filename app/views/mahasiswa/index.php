<section class="py-36">
  <div class="container mx-auto px-6">
    <div class="flex-flex-wrap">
      <div class="max-w-full w-[600px] mx-auto py-3">
        <button class="btn btn_primary px-5" onclick="modal_insert.style.display = 'block'">Tambah</button>
      </div>
    </div>
    <div class="flex flex-wrap">
      <div class="max-w-full w-[600px] bg-slate-100 mx-auto px-6 py-3 rounded-[8px]">
        <div class="w-full px-5">
          <div class="mb-3 text-secondary-text lg:text-xl text-lg font-bold">
            <h5>List Mahasiswa</h5>
          </div>
          <hr class="mb-3 border-slate-400">
          <div class="card_body">
            <div class="max-h-[62vh] overflow-auto my-5">
              <table class="table w-full rounded-[8px] overflow-hidden">
                <thead class="bg-secondary-bg">
                  <tr>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      No
                    </th>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      Name
                    </th>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody id="tbody_mahasiswa">
                  <?php foreach ($data["list_mahasiswa"] as $key => $mhs) : ?>
                    <tr class="bg-gray-100 hover:bg-gray-200 border-b last:border-0 transition duration-300 ease-in-out">
                      <td class="md:text-md text-sm leading-[1.25] py-2 px-3 text-dark text-center">
                        <?= $key + 1 ?>
                      </td>
                      <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
                        <?= $mhs->name ?>
                      </td>
                      <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
                        <a class="link link_btn link_primary" href="<?= BASE_URL ?>/mahasiswa/detail/<?= $mhs->id ?>">
                          Detail
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="<?= BASE_URL; ?>/assets/js/mahasiswa.js"></script>