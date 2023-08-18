var body = document.querySelector('body');
var cajaFiltros = document.querySelector('.caja_filtros');

function showFilter() {
    body.style.overflow = 'hidden';
    cajaFiltros.style.display = 'flex';
}

function removeFilter() {
    body.style.overflow = 'scroll';
    cajaFiltros.style.display = 'none';
}