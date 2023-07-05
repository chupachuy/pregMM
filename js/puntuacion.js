// Posicionar cuadro de búsqueda
$('#contArrow').hide();
window.onscroll = function() {
  var y = window.scrollY;
  // console.log(y);
  if( y > 100 ){
   $('#busIdGlo').addClass('busquedaGloFix');
   $('#busIdGlo').removeClass('busquedaGloNorm');
  }else{
   $('#busIdGlo').removeClass('busquedaGloFix');
   $('#busIdGlo').addClass('busquedaGloNorm');
  }
};

// Variables
const d = document;
const $itemCont = d.querySelectorAll('.itemCont');
const $busq = d.getElementById('busq');
const coincidencias = [];
const $contArrow = d.getElementById('contArrow');
const $contCoinc = d.getElementById('contCoinc');
const $respCoin = d.getElementById('respCoin');

// Buscar
function fncBuscarPal(){
    // Obtener coincidencias
    let nomForm = '';
    let encontro = '';
    coincidencias.length = 0;
    if ( $busq.value == '' ) {
        $respCoin.style.display = 'block';
        $respCoin.innerHTML = 'Escribe algo para poder iniciar la búsqueda';
    }else{
        $respCoin.style.display = 'none';
        $respCoin.innerHTML = '';
        for (let i = 0; i < $itemCont.length; i++) {
            let elem = d.getElementById('id_' + (i+1));
            elem.classList.remove('sombraRes');
            nomForm = $itemCont[i].cells[1].innerHTML.toLowerCase();
            nomForm = removerAcentos(nomForm);
            encontro = nomForm.search(($busq.value).toLowerCase());
            if ( encontro != -1 ) {
                coincidencias.push($itemCont[i].cells[1].dataset.rank);
            }
        }
        // Marcar Resultados
        for (let i = 0; i < coincidencias.length; i++) {
            if ( ($busq.value).toLowerCase() != '' ) {
                let elem = d.getElementById('id_'+coincidencias[i])
                elem.classList.add('sombraRes');
            }
        }

    }

    if ( coincidencias.length == 0 ) {
        $respCoin.style.display = 'block';
        contArrow.style.display = 'none';
        $contCoinc.style.display = 'none';
        $respCoin.innerHTML = 'No se encontraron usuarios';
        coincidencias.length = 0;
    }else{
        $respCoin.style.display = 'none';
        $contCoinc.style.display = 'block';
        $contCoinc.innerHTML = '';
        // Mostrar acotaciones
        let primerElem = d.getElementById('id_' + coincidencias[0]);
        // Ir a primer resultado
        primerElem.scrollIntoView({behavior: "smooth"});
        fncIrResult(coincidencias);
        if (coincidencias.length > 1) {
            contArrow.style.display = 'inline-block';
        }else{
            contArrow.style.display = 'none';
            $contCoinc.style.display = 'none';
        }
    }
}
// Quitar acentos
const removerAcentos = (str) => {
  return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
} 

// Navegar resultados
function fncIrResult(coincidencias){
    let numTot = coincidencias.length;
    let contCoinc = 1;
    // Armar contador
    $contCoinc.innerHTML = `${contCoinc} de ${numTot} coincidencias`;
    contArrow.addEventListener('click', () => {
        // Llevar a cada resultado
        $itemCont[(coincidencias[(contCoinc - 1)] - 1)].scrollIntoView({behavior: "smooth"});
        // Actualizar contador
        $contCoinc.innerHTML = `${contCoinc} de ${numTot} coincidencias`;
        if (contCoinc == numTot) {
            contCoinc = 1;
        }else{
            contCoinc++;
        }
    });
}
