//javascript

function Protocolo(){

	this.TIPO_CAJA_NORMAL = "0";
	this.TIPO_CAJA_DECISION = "1";
	this.TIPO_DECISION_SI = "0";
	this.TIPO_DECISION_NO = "1";
	this.TIPO_DECISION_DIRECTA = "2";
	
	this.TYPE_NORMAL_BOX = "0";	
	this.TYPE_DECISION_BOX = "1";
	this.TYPE_YES_DECISION = "0";
	this.TYPE_NO_DECISION = "1";
	this.TYPE_DIRECT_DECISION = "2";


	var generadorID;
	var lista_cajas;

	this.init = function(){
		this.reset();
	}
	this.reset = function(){
		generadorID = crearGenerador();
		lista_cajas = new Array();
	}

	this.crearCaja = function(tipo_caja,padre_id,tipoRelacion,contenido_caja){

		var nuevo_id = generadorID();
		var caja = {
				id			:	nuevo_id,
				padres		:	[padre_id],
				tipo		:	tipo_caja,
				contenido	:	contenido_caja,
				relacion	:	tipoRelacion,
				hijo_si			: 	-1,
				hijo_no			: 	-1,
				completo	: 	false
			};
		
		lista_cajas.push(caja);
		
		return nuevo_id;
	}	
	
	this.imprimirConsola = function(){

		var texto='';
		for (var i=0; i<lista_cajas.length; i++) {
			texto+= lista_cajas[i].id+"-"+lista_cajas[i].padres+"-"+lista_cajas[i].contenido+"-"+lista_cajas[i].relacion+
			"-"+lista_cajas[i].hijo_si+"-"+lista_cajas[i].hijo_no+"-"+lista_cajas[i].completo+"\n";
		}
		
		console.log(texto);
	}
	
	this.getListaCajas = function(){
		return lista_cajas;
	}

	this.getCaja = function(id){
		for (var i=0; i<lista_cajas.length; i++) {
			if(lista_cajas[i].id==id){
				return lista_cajas[i];
			}
		}
	}

	this.recortarString = function(contenido){

		if(contenido.length<17){
			return contenido;
		}
		else{
			return contenido.substring(0,14)+'...';
		}
	}

	var crearGenerador = function () {
	   var cuenta, f;
	   cuenta = -1;
	   f = function () {
		   cuenta = cuenta + 1;
		   return cuenta;
	   };
	   return f;
	};

	this.formatearString = function(contenido){

		var lista = [];
		var tam = contenido.length;
		
		var i=0;
		var desplazamiento = 0;
		while (i<tam) {
			
			if (i+30-1<tam){
				
				desplazamiento = nextWhiteSpace(contenido.substring(i+30,tam));
				lista.push(contenido.substring(i,i+30+desplazamiento));

			}
			else{
				var sub_string = contenido.substring(i,tam);
				desplazamiento=0;
				lista.push(sub_string);
			}

			i=i+30+desplazamiento;
		}

		var contenido_formateado = '';
		for (var i=0; i<lista.length; i++) {
			contenido_formateado = contenido_formateado + lista[i].trim() + '\n';
		}
		
		if(contenido_formateado.length>0){
			return contenido_formateado.substring(0,contenido_formateado.length-1);
		}
		else{
			return contenido_formateado;
		}

	}

	function nextWhiteSpace(contenido){

		var i=0;
		for(; i<contenido.length; i++){
			if (contenido[i]==' ') {
				return i;
			}
		}

		return i;
	}
		

}