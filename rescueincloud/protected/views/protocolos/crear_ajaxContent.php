
<input id="texto" type="text" placeholder="Nombre del protocolo" />
<input id="empezar" type="button" onclick="empezar();" value="empezar" />
<textarea id="contenido" style="width: 100%;" rows="4" placeholder="Introduce el texto de la nueva caja"></textarea>
<select id="tipo_caja" name="tipo_caja" >
<option selected value="-1">--- Elige tipo de caja ---</option>
    <option value="0">Normal</option>
    <option value="1">Decisión</option>
</select>

<select id="padres" >
    <option selected value="-1">--- Es hijo de ---</option>
</select>

<select id="tipo_decision" >
<option selected value="-1">--- Elige tipo de decisión ---</option>
    <option value="0">Si</option>
    <option value="1">No</option>
    <option value="2">Nada</option>
</select>

<button id="crear" type="button" onclick="crearCaja();">Crear caja</button>
<div>
<select id="rel_padres" >
    <option selected value="-1">--- Padres ---</option>
</select>
<select id="rel_hijos" >
    <option selected value="-1">--- Hijos ---</option>
</select>
<button id="crear_relacion" type="button" onclick="crearRelacion();">Crear nueva relación</button>
</div>
<div id="canvas"></div>
