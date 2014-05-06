var chartR;
var Estados = { LIMPIO: 1, INIT: 2, EDICION: 3};
var estadoActual;
var codigo;
var protocolo;

var configuracion =  {
          'line-width': 3,
          'line-length': 50,
          'text-margin': 10,
          'font-size': 14,
          'font': 'normal',
          'font-family': 'Helvetica',
          'font-weight': 'normal',
          'font-color': 'black',
          'line-color': 'black',
          'element-color': 'black',
          'fill': 'white',
          'yes-text': 'yes',
          'no-text': 'no',
          'arrow-end': 'block',
          'symbols': {
            'start': {
              'font-color': 'red',
              'element-color': 'green',
              'fill': 'yellow'
            }
          }
        };

function mostrarDemo(){
		
        var code = 'st=>start: Un protocolo llamado bla\n'+
		'e=>end: Fin del protocolo\n'+
		'\n'+
		'op_si1=>operation: Otra caja más\n'+
		'op_no1=>operation: Otra caja negativa 1\n'+
		'cond1=>condition: yes or no?\n'+
		'\n'+
		'\n'+
		'op_si0=>operation: Otra caja positiva\n'+
		'op_no0=>operation: Otra caja negativa\n'+
		'cond0=>condition: Esta es una \n'+
		'caja de decisión\n'+
		'si o no?\n'+
		'\n'+
		'st->cond0\n'+
		'cond0(yes, right)->op_si0->op_si1\n'+
		'cond0(no)->cond1\n'+
		'cond1(yes, right)->op_si1\n'+
		'cond1(no)->op_no1->e\n';

        if (chartR && estadoActual!==Estados.LIMPIO) {
        	chartR.clean();
        }

        chartR = flowchart.parse(code);
        chartR.drawSVG('canvas', configuracion);
        
        estadoActual = Estados.EDICION;
    
}

function pintarCanvas(){

	if (chartR && estadoActual!==Estados.LIMPIO) {
		chartR.clean();
	}

	chartR = flowchart.parse(codigo);
	chartR.drawSVG('canvas', configuracion);
        
	estadoActual = Estados.EDICION;
}

function reset(){
	
	if (chartR && estadoActual!==Estados.LIMPIO) {
		chartR.clean();
		estadoActual = Estados.LIMPIO;
		codigo = '';
	}

	if(protocolo)
		protocolo.reset();
	else
		protocolo = new Protocolo();

	var lista = protocolo.getListaCajas();
	var selectList = document.getElementById('padres');
	selectList.options.length = 0;
	
	var option = document.createElement('option');
	option.text = '--- Es hijo de ---';
	option.value = '-1';
	selectList.add(option);
}

function empezar(){

	var nombre_protocolo = document.getElementById('texto').value;
	codigo = 'st=>start: '+nombre_protocolo+'\n'+
		'e=>end: Fin del protocolo\n'+
		'\n'+
		'st->';
		
	if (chartR && estadoActual!==Estados.LIMPIO) {
		chartR.clean();
	}

	chartR = flowchart.parse(codigo);
	chartR.drawSVG('canvas', configuracion);
	
	estadoActual = Estados.EDICION;
	//en el caso de la raíz, se tiene el id=0 así que el resto de atributos
	//se desprecierán(salvo el contenido, o en este caso el nombre del protocolo)
	protocolo.crearCaja(0,0,0,nombre_protocolo);
	
	actualizarLista(0,nombre_protocolo);
	
}

function actualizarLista(id,contenido){

	actualizarPadres(id,contenido);
	actualizarRelPadres(id,contenido);
	actualizarRelHijos(id,contenido);
}

function actualizarPadres(id,contenido){

	var selectList = document.getElementById('padres');

	var option = document.createElement('option');
	option.text = contenido;
	option.value = id;
	selectList.add(option);
}

function actualizarRelPadres(id,contenido){
	var selectList = document.getElementById('rel_padres');

	var option = document.createElement('option');
	option.text = contenido;
	option.value = id;
	selectList.add(option);
}

function actualizarRelHijos(id,contenido){
	var selectList = document.getElementById('rel_hijos');

	var option = document.createElement('option');
	option.text = contenido;
	option.value = id;
	selectList.add(option);
}

function crearCaja(){

	var contenido = document.getElementById('contenido').value;
	
	if(!contenido || contenido.length===0){
		alert("No puedes dejar el contenido de la caja vacía.");
		return false;
	}

	var selectTipoCaja = document.getElementById('tipo_caja');
	var tipoCaja = selectTipoCaja.options[selectTipoCaja.selectedIndex].value;
	
	var selectPadres = document.getElementById('padres');
	var id_padre = selectPadres.options[selectPadres.selectedIndex].value;
	
	var selectDecision = document.getElementById('tipo_decision');
	var tipoRelacion = selectDecision.options[selectDecision.selectedIndex].value;
	
	if(tipoCaja==-1 || id_padre==-1 || tipoRelacion==-1){
		alert('Debes seleccionar una opción válida');
		return;
	}
	
	var id = protocolo.crearCaja(tipoCaja,id_padre,tipoRelacion,contenido);
	var caja_padre = protocolo.getCaja(id_padre);
	
	if(caja_padre.tipo==0){//normal
		caja_padre.completo = true;
		eliminarPadreDeLista(id_padre);
	}
	else{//1 decision
		if(tipoRelacion==0){//hijo sí
			caja_padre.hijo_si = id;
		}
		else{//hijo no
			caja_padre.hijo_no = id;
		}

		if(caja_padre.hijo_si != -1 && caja_padre.hijo_no != -1){
			caja_padre.completo = true;
			eliminarPadreDeLista(id_padre);
		}

	}

	actualizarLista(id,contenido);
	protocolo.imprimirConsola();
	
	//pintar nuevos cambios
	pintarNuevaCaja(id,tipoCaja,id_padre,tipoRelacion,contenido);

	document.getElementById('contenido').value='';
	document.getElementById('tipo_caja').value = '-1';
	document.getElementById('padres').value = '-1';
	
}

function eliminarPadreDeLista(id_padre){
	var padres = document.getElementById('padres');
	var i;
	for (i = padres.length - 1; i>=0; i--) {
		if (padres.options[i].value==id_padre) {
			padres.remove(i);
			break;//Es importante no seguir iterando cuando se elimina un elemento
		}
	}
}

function crearRelacion(){

	var selectRelPadres = document.getElementById('rel_padres');
	var id_padre = selectRelPadres.options[selectRelPadres.selectedIndex].value;
	
	var selectRelHijos = document.getElementById('rel_hijos');
	var id_hijo = selectRelHijos.options[selectRelHijos.selectedIndex].value;
	
	if(id_padre==-1 || id_hijo==-1){
		alert('Debes seleccionar una opción válida');
		return;
	}

	var caja_padre = protocolo.getCaja(id_padre);

	if(caja_padre.completo==true){
		alert(caja_padre.contenido_caja+' ya no puede tener más hijos.');
		return;
	}
	else{
		var caja_hijo = protocolo.getCaja(id_hijo);		
		caja_hijo.padres.push(id_padre);
	}

	pintarNuevaRelacion(id_padre,id_hijo);
	console.log(codigo);
	pintarCanvas();

	
}

function pintarNuevaCaja(id,tipoCaja,id_padre,tipoRelacion,contenido){

	if(tipoCaja==0){//normal
	
		var nuevo_texto = 
		id+'=>operation: '+contenido+'\n';
		codigo = nuevo_texto + codigo;
	
		if(tipoRelacion==2){//nada
			
			if(id_padre==0){
				codigo = codigo +''+id+'\n';
			}
			else{
				codigo = codigo + id_padre+'->'+id+'\n';
			}
		}
		else if(tipoRelacion==0){//Sí
			codigo = codigo +'cond'+id_padre+'(yes, right)->'+id+'\n';
		}
		else{//tipoRelacion==1 No
			
			codigo = codigo +'cond'+id_padre+'(no)->'+id+'\n';
		}
	}
	else{//tipoCaja==1 decisión
	
		var nuevo_texto = 
		'cond'+id+'=>condition: '+contenido+'\n';
		codigo = nuevo_texto + codigo;
			
		if(tipoRelacion==2){//nada
			
			if(id_padre==0){
				codigo = codigo +'cond'+id+'\n';
			}
			else{
				codigo = codigo + id_padre+'->cond'+id+'\n';
			}
		}
		else if(tipoRelacion==0){//Sí
			codigo = codigo +'cond'+id_padre+'(yes, right)->cond'+id+'\n';
		}
		else{//tipoRelacion==1 No
			codigo = codigo +'cond'+id_padre+'(no)->cond'+id+'\n';
		}
		
		
		
	}
	console.log(codigo);
	pintarCanvas();
	
	
}

function pintarNuevaRelacion(id_padre, id_hijo){

	codigo = codigo +id_padre+'->'+id_hijo+'\n';
}

function padre_elegido(){

	var selectPadres = document.getElementById('padres');
	var id_padre = selectPadres.options[selectPadres.selectedIndex].value;

	if(id_padre != -1){
		var caja = protocolo.getCaja(id_padre);
		var selectList = document.getElementById('tipo_decision');
		selectList.options.length = 0;
		if(caja.tipo==0){//caja normal
			var option = document.createElement('option');
			option.text = "Directa";
			option.value = "2";
			selectList.add(option);
		}
		else{//caja decisión

			if(caja.hijo_si == -1){
				var option0 = document.createElement('option');
				option0.text = "Sí";
				option0.value = "0";
				selectList.add(option0);
			}

			if(caja.hijo_no == -1){
				var option1 = document.createElement('option');
				option1.text = "No";
				option1.value = "1";
				selectList.add(option1);
			}
		}
	}

}

window.onload = function () {
	estadoActual = Estados.LIMPIO;
	codigo = '';
	protocolo = new Protocolo();
	protocolo.init();
	/*document.getElementById('empezar').onclick=empezar;
	document.getElementById('reset').onclick=reset;
	document.getElementById('demo').onclick=mostrarDemo;
	document.getElementById('crear').onclick=crearCaja;
	document.getElementById('crear_relacion').onclick=crearRelacion;*/
};