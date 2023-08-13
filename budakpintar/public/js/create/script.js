const TEMPLATEBODY = document.querySelector('#template-body');
const TAMBAHSOAL_SINGLE = document.querySelector('#tambah-soal-single');
const TAMBAHSOAL_MULTIPLE = document.querySelector('#tambah-soal-multiple');

var counter = 0
TAMBAHSOAL_SINGLE.addEventListener('click',function(){
    const EL = document.createElement('div');
    EL.classList = 'row justify-content-center';
    let template = `          
    <h5 class="text-center">Pertanyaan ${counter+1}</h5>
    <div class="mb-3">
      <label for="pertanyaan" class="form-label">Pertanyaan</label>
      <input type="hidden" name="soal[${counter}][tipe_soal]" value="single">
      <textarea rows="3" type="text" class="form-control" name="soal[${counter}][pertanyaan]"></textarea>
    </div>
    <div class="container mb-4">
      <label for="opsi-a" class="form-label">Opsi Jawaban</label>
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-a]" placeholder="Opsi A">
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-b]" placeholder="Opsi B">
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-c]" placeholder="Opsi C">
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-d]" placeholder="Opsi D">
    </div>
    <div class="container mb-2">

      <div class="card">
        <div class="card-body justify-content-between d-flex align-items-center"
          style="padding: 1rem !important;">
          <div class="d-inline-block">Pilihlah opsi yang benar</div>
          <div class="d-inline-block">
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="radio" id="jawabanA${counter}"
                name="soal[${counter}][jawaban]" value="a">
              <label class="form-check-label" for="jawabanA${counter}">
                A
              </label>
            </div>
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="radio" id="jawabanB${counter}"
                name="soal[${counter}][jawaban]" value="b">
              <label class="form-check-label" for="jawabanB${counter}">
                B
              </label>
            </div>
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="radio" id="jawabanC${counter}"
                name="soal[${counter}][jawaban]" value="c">
              <label class="form-check-label" for="jawabanC${counter}">
                C
              </label>
            </div>
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="radio" id="jawabanD${counter}"
                name="soal[${counter}][jawaban]" value="d">
              <label class="form-check-label" for="jawabanD${counter}">
                D
              </label>
            </div>
          </div>
        </div>
       </div>
      <hr>
     </div>`;
    EL.innerHTML = template;
    TEMPLATEBODY.append(EL);

    counter+=1;
});

TAMBAHSOAL_MULTIPLE.addEventListener('click',function(){
    const EL = document.createElement('div');
    EL.classList = 'row justify-content-center';
    let template = `          
    <h5 class="text-center">Soal ${counter+1}</h5>
    <input type="hidden" name="soal[${counter}][tipe_soal]" value="single">
    <div class="mb-3">
      <label for="pertanyaan" class="form-label">Pertanyaan</label>
      <textarea rows="3" type="text" class="form-control" name="soal[${counter}][pertanyaan]"></textarea>
    </div>
    <div class="container mb-4">
      <label for="opsi-a" class="form-label">Opsi Jawaban</label>
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-a]" placeholder="Opsi A">
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-b]" placeholder="Opsi B">
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-c]" placeholder="Opsi C">
      <input type="text" class="form-control mb-2" name="soal[${counter}][opsi-d]" placeholder="Opsi D">
    </div>
    <div class="container mb-2">

      <div class="card">
        <div class="card-body justify-content-between d-flex align-items-center"
          style="padding: 1rem !important;">
          <div class="d-inline-block">Pilihlah opsi yang benar</div>
          <div class="d-inline-block">
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="checkbox" id="jawabanA${counter}"
                name="soal[${counter}][jawaban-a]">
              <label class="form-check-label" for="jawabanA${counter}">
                A
              </label>
            </div>
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="checkbox" id="jawabanB${counter}"
                name="soal[${counter}][jawaban-b]">
              <label class="form-check-label" for="jawabanB${counter}">
                B
              </label>
            </div>
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="checkbox" id="jawabanC${counter}"
                name="soal[${counter}][jawaban-c]">
              <label class="form-check-label" for="jawabanC${counter}">
                C
              </label>
            </div>
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="checkbox" id="jawabanD${counter}"
                name="soal[${counter}][jawaban-d]">
              <label class="form-check-label" for="jawabanD${counter}">
                D
              </label>
            </div>
          </div>
        </div>
       </div>
      <hr>
     </div>`;
    EL.innerHTML = template;
    TEMPLATEBODY.append(EL);

    counter+=1;
});