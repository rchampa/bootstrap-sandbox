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
	protocolo.reset();
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
	
	var id = protocolo.crearCaja(tipoCaja,id_padre,0,contenido);
	actualizarLista(id,contenido);
	protocolo.imprimirConsola();
	
	//pintar nuevos cambios
	pintarNuevaCaja(id,tipoCaja,id_padre,tipoRelacion,contenido);
	
}

function crearRelacion(){

	var selectRelPadres = document.getElementById('rel_padres');
	var relPadre = selectRelPadres.options[selectRelPadres.selectedIndex].value;
	
	var selectRelHijos = document.getElementById('rel_hijos');
	var relHijo = selectRelHijos.options[selectRelHijos.selectedIndex].value;
	
	if(relPadre==-1 || relHijo==-1){
		alert('Debes seleccionar una opción válida');
		return;
	}
	
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

window.onload = function () {
	estadoActual = Estados.LIMPIO;
	codigo = '';
	protocolo = new Protocolo();
	protocolo.init();
	document.getElementById('empezar').onclick=empezar;
	document.getElementById('reset').onclick=reset;
	document.getElementById('demo').onclick=mostrarDemo;
	document.getElementById('crear').onclick=crearCaja;
	document.getElementById('crear_relacion').onclick=crearRelacion;
};