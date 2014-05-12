<div class="row clearfix">
        <div class="col-md-12 column">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <div class="panel-title">
                        <i class="glyphicon glyphicon-wrench pull-right"></i>
                <h4>Crear un nuevo protocolo</h4>
                </div>
                </div>
                <div class="panel-body">



                <div class="control-group">
                  <label>Nombre del protocolo</label>
                  <div class="controls">
                   <input type="text" id="texto" class="form-control" placeholder="Introduce un nombre">
                  </div>
                </div>
                <label></label>
               <div class="controls">
                  <button id="empezar" type="button" class="btn btn-success" onclick="empezar()" >Empezar nuevo protocolo</button>
               </div>

                <label></label>
                <div class="control-group">
                  <label>Nueva caja</label>
                  <div class="controls">
                    <select class="form-control" id="padres" onchange="padre_elegido()" >
                          <option selected value="-1" >--- Es hijo de ---</option>
                    </select>
                  </div>
                  <label></label>
                  <div class="controls">
                    <select class="form-control" id="tipo_decision" >
                        <option selected value="-1">--- Elige tipo de decisión ---</option>
                        <option value="0">Si</option>
                        <option value="1">No</option>
                        <option value="2">Directa</option>
                  </select>
                  </div>
                  <label></label>
                  <div class="controls">
                    <select class="form-control" id="tipo_caja" name="tipo_caja" >
                          <option selected value="-1">--- Elige tipo de caja ---</option>
                          <option value="0">Normal</option>
                          <option value="1">Decisión</option>
                    </select>
                  </div>
                  <label></label>
                  <div class="controls">
                        <textarea id="contenido" class="form-control" placeholder="Introduce el texto de la nueva caja"></textarea>
                  </div>

                   <label></label>
                   <div class="controls">
                   <button class="btn btn-success" type="button" onclick="crearCaja()">Crear caja</button>
                   </div>

                </div>

                <label></label>
                <div class="row clearfix">
                  <div class="col-md-4 column">
                    <div class="control-group">
                      <label>Padres</label>
                      <div class="controls">
                        <select class="form-control" id="rel_padres" >
                              <option selected value="-1">--- Padres ---</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 column">
                    <label></label>
                    <div class="text-center">
                   <div class="controls">
                   <button class="btn btn-success" id="crear_relacion" onclick="crearRelacion()" >Crear Relacion</button>
                   </div>
                   </div>
                  </div>
                  <div class="col-md-4 column">
                    <div class="control-group">
                      <label>Hijos</label>
                      <div class="controls">
                        <select class="form-control" id="rel_hijos" >
                            <option selected value="-1">--- Hijos ---</option>
                      </select>
                      </div>
                    </div>
                  </div>
                </div>

                <label></label>
                <div id="canvas"></div>

                <div class="control-group">
                    <label></label>
                    <div class="controls">
                    <form action="<?php echo Yii::app()->createUrl('/protocolos/alta') ?>" method="post" onsubmit="sendToServer()">
                        <input type="hidden" name="json_info" id="json_info">
                        <input type="hidden" name="code" id="code">
                        <button type="submit" class="btn btn-primary">Terminar</button>
                    </form>
                    </div>

                </div>

          </div><!--/panel content-->
        </div><!--/panel-->
        </div>
</div>