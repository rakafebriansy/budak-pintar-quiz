
const BODY  = document.querySelector('body');

BODY.addEventListener('click',(e)=>{
    if (e.target.id == 'simpan'){
        const GAMBAR  = document.querySelector('#gambar');
        console.log(GAMBAR.value)
    }
})