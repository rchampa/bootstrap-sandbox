//javascript

function Protocolo(){
		
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
							padre		:	padre_id,
							tipo		:	tipo_caja,
							contenido	:	contenido_caja,
							relacion	:	tipoRelacion
						};
					
					lista_cajas.push(caja);
					
					return nuevo_id;
				}	
				
				this.imprimirConsola = function(){

					var texto='';
					for (var i=0; i<lista_cajas.length; i++) {
						texto+= lista_cajas[i].id+"-"+lista_cajas[i].padre+"-"+lista_cajas[i].contenido+"-"+lista_cajas[i].relacion+"\n";
					}
					
					console.log(texto);
				}
				
				this.getListaCajas = function(){
					return lista_cajas;
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
					

			}