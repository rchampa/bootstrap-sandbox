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
          'yes-text': 'si',
          'no-text': 'no',
          'arrow-end': 'block',
          'symbols': {
            'start': {
              'font-color': 'black',
              'element-color': 'black',
              'fill': '#FF5555'
            },
            'condition': {
              'font-color': 'black',
              'element-color': 'black',
              'fill': '#FAEA59'
            },
            'operation': {
              'font-color': 'black',
              'element-color': 'black',
              'fill': '#4AAF46'
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
        
        var texto = document.getElementById('texto');
        texto.disabled = false;
        texto.value="";
        
        document.getElementById('empezar').disabled = false;
}

function empezar(){

	var nombre_protocolo = document.getElementById('texto').value;
	codigo = 'st=>start: '+nombre_protocolo+'\n'+
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

	actualizarPadres(0,protocolo.recortarString(nombre_protocolo));
        
        document.getElementById('texto').disabled = true;
        document.getElementById('empezar').disabled = true;

}
/*
function actualizarLista(id,contenido){

	actualizarPadres(id,contenido);
	actualizarRelPadres(id,contenido);
	actualizarRelHijos(id,contenido);
}*/

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
	contenido = protocolo.formatearString(contenido);


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

	//actualizando al padre
	var id = protocolo.crearCaja(tipoCaja,id_padre,tipoRelacion,contenido);
	var caja_padre = protocolo.getCaja(id_padre);

	if(caja_padre.tipo==protocolo.TYPE_NORMAL_BOX){//normal
		caja_padre.completo = true;
		eliminarPadreComoElegible(id_padre);
	}
	else{//1 decision
		if(tipoRelacion==protocolo.TYPE_YES_DECISION){//hijo sí
			caja_padre.hijo_si = id;
		}
		else{//hijo no
			caja_padre.hijo_no = id;
		}

		if(caja_padre.hijo_si != -1 && caja_padre.hijo_no != -1){
			caja_padre.completo = true;
			eliminarPadreComoElegible(id_padre);
		}

	}

	//actualizarLista(id,contenido);
	var contenido_recortado = protocolo.recortarString(contenido);
	actualizarPadres(id,contenido_recortado);
	actualizarRelHijos(id,contenido_recortado);
	if (tipoCaja==protocolo.TYPE_NORMAL_BOX) {//Sólo si la caja es NORMAL
		actualizarRelPadres(id,contenido_recortado);
	}


	protocolo.imprimirConsola();

	//pintar nuevos cambios
	pintarNuevaCaja(id,tipoCaja,id_padre,tipoRelacion,contenido);

	document.getElementById('contenido').value='';
	document.getElementById('tipo_caja').value = '-1';
	document.getElementById('padres').value = '-1';

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

	if(id_padre==id_hijo){
		alert('Debes seleccionar una opción válida');
		return;
	}

	var caja_padre = protocolo.getCaja(id_padre);

	if(caja_padre.completo==true){
		alert(caja_padre.contenido_caja+' ya no puede tener más hijos.');
		eliminarPadreComoElegible(caja_padre.id);
		return;
	}
	else{
		var caja_hijo = protocolo.getCaja(id_hijo);
		caja_hijo.padres.push(id_padre);
		caja_padre.completo=true;
		eliminarPadreComoElegible(caja_padre.id);
	}

	pintarNuevaRelacion(id_padre,id_hijo);
	console.log(codigo);
	pintarCanvas();


}


function eliminarPadreComoElegible(id_padre){
	var padres = document.getElementById('padres');
	var i;
	for (i = padres.length - 1; i>=0; i--) {
		if (padres.options[i].value==id_padre) {
			padres.remove(i);
			break;//Es importante no seguir iterando cuando se elimina un elemento
		}
	}

	var rel_padres = document.getElementById('rel_padres');
	var i;
	for (i = rel_padres.length - 1; i>=0; i--) {
		if (rel_padres.options[i].value==id_padre) {
			rel_padres.remove(i);
			break;//Es importante no seguir iterando cuando se elimina un elemento
		}
	}
}

function pintarNuevaCaja(id,tipoCaja,id_padre,tipoRelacion,contenido){

	if(tipoCaja==protocolo.TYPE_NORMAL_BOX){//normal

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
		else if(tipoRelacion==protocolo.TYPE_YES_DECISION){//Sí
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

		if(tipoRelacion==protocolo.TYPE_DIRECT_DECISION){//directa

			if(id_padre==0){
				codigo = codigo +'cond'+id+'\n';
			}
			else{
				codigo = codigo + id_padre+'->cond'+id+'\n';
			}
		}
		else if(tipoRelacion==protocolo.TYPE_YES_DECISION){//Sí
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

	var caja_hijo = protocolo.getCaja(id_hijo);
	if(caja_hijo.tipo==0)
		codigo = codigo +id_padre+'->'+id_hijo+'\n';
	else
		codigo = codigo +id_padre+'->cond'+id_hijo+'\n';
}

function padre_elegido(){

	var selectPadres = document.getElementById('padres');
	var id_padre = selectPadres.options[selectPadres.selectedIndex].value;

	if(id_padre != -1){
		var caja = protocolo.getCaja(id_padre);
		var selectList = document.getElementById('tipo_decision');
		selectList.options.length = 0;

		var opt = document.createElement('option');
		opt.text = "--- Elige tipo de decisión ---";
		opt.value = "-1";
		selectList.add(opt);

		if(caja.tipo==protocolo.TYPE_NORMAL_BOX){//caja normal
			var option = document.createElement('option');
			option.text = "Directa";
			option.value = protocolo.TYPE_DIRECT_DECISION;
			selectList.add(option);
		}
		else{//caja decisión

			if(caja.hijo_si == -1){
				var option0 = document.createElement('option');
				option0.text = "Sí";
				option0.value = protocolo.TYPE_YES_DECISION;
				selectList.add(option0);
			}

			if(caja.hijo_no == -1){
				var option1 = document.createElement('option');
				option1.text = "No";
				option1.value = protocolo.TYPE_NO_DECISION;
				selectList.add(option1);
			}
		}
	}

}

function sendToServer(){
	var cajas = protocolo.getListaCajas();
	var cajasJSON = JSON.stringify(cajas);

        var json_info = document.getElementById('json_info');
        json_info.value = cajasJSON;

        var code = document.getElementById('code');
        code.value = codigo;

}

var Utf8 = {
 
    // public method for url encoding
    encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";
 
        for (var n = 0; n < string.length; n++) {
 
            var c = string.charCodeAt(n);
 
            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }
 
        }
 
        return utftext;
    },
 
    // public method for url decoding
    decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;
 
        while ( i < utftext.length ) {
 
            c = utftext.charCodeAt(i);
 
            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }
 
        }
 
        return string;
    }
 
}

function loadFromServer(codigo_parseado,lista){
    
    if(codigo_parseado){
        
        if (chartR && estadoActual!==Estados.LIMPIO) {
            chartR.clean();
        }

        codigo = Utf8.decode(Utf8.encode(codigo_parseado));
        chartR = flowchart.parse(codigo);
        chartR.drawSVG('canvas', configuracion);

        estadoActual = Estados.EDICION;
        
        //console.log(codigo);
        
        protocolo = new Protocolo();
	protocolo.init();
        
        for(var i=0; i<lista.length; i++){
            protocolo.cargarCaja(
                    lista[i].id,
                    lista[i].padres,
                    lista[i].tipo,
                    lista[i].contenido,
                    lista[i].relacion,
                    lista[i].hijo_si,
                    lista[i].hijo_no,
                    lista[i].completo);
        }
        
        
        var titulo_texto = document.getElementById('texto');
        titulo_texto.value = lista[0].contenido;
        titulo_texto.disabled = true;
        document.getElementById('empezar').disabled = true;
        
        var selectPadres = document.getElementById('padres');
        selectPadres.options.length = 0;
        var opt = document.createElement('option');
        opt.text = "--- Elige tipo de decisión ---";
        opt.value = "-1";
        selectPadres.add(opt);
        
        for(var i=1; i<lista.length; i++){
            if(lista[i].completo==false){
                var opt = document.createElement('option');
                opt.text = lista[i].contenido;
                opt.value = lista[i].id;
                selectPadres.add(opt);
            }       
        }
        
        protocolo.imprimirConsola();
        
        load_from_server = true;
        
    }
    
}

window.onload = function () {
	
        if(!load_from_server){
            estadoActual = Estados.LIMPIO;
            codigo = '';
            protocolo = new Protocolo();
            protocolo.init();
        }
            
	/*document.getElementById('empezar').onclick=empezar;
	document.getElementById('reset').onclick=reset;
	document.getElementById('demo').onclick=mostrarDemo;
	document.getElementById('crear').onclick=crearCaja;
	document.getElementById('crear_relacion').onclick=crearRelacion;*/
};