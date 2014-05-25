function seleccionarProtocolos() {
  document.getElementById('enlace_home').className = '';
  document.getElementById('enlace_protocolos').className = 'active';
  document.getElementById('enlace_farmacos').className = '';
  document.getElementById('enlace_notas').className = '';
  return true;
}

function seleccionarHome() {
  document.getElementById('enlace_home').className = 'active';
  document.getElementById('enlace_protocolos').className = '';
  document.getElementById('enlace_farmacos').className = '';
  document.getElementById('enlace_notas').className = '';
  return true;
}

function seleccionarFarmacos() {
  document.getElementById('enlace_home').className = '';
  document.getElementById('enlace_protocolos').className = '';
  document.getElementById('enlace_farmacos').className = 'active';
  document.getElementById('enlace_notas').className = ''; 
  return true;
}

function seleccionarNotas() {
  document.getElementById('enlace_home').className = '';
  document.getElementById('enlace_protocolos').className = '';
  document.getElementById('enlace_farmacos').className = '';
  document.getElementById('enlace_notas').className = 'active'; 
  return true;
}