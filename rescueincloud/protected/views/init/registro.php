<div id="container" >
    <form class="form-horizontal" action="<?php echo Yii::app()->createUrl('/farmacos/editarFarmaco') ?>" method="post">
            <div class="control-group">
                    <label class="control-label" for="EmailUsuario">E-mail</label>
                    <div class="controls" style="position:relative; right:15%;">
                            <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span> <input type="email" id="EmailUsuario" name="EmailUsuario" placeholder="E-mail" required="" data-validation-email-message="Por favor, introduce un e-mail válido"></div><br>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="NombreUsuario">Nombre</label>
                    <div class="controls" style="position:relative; right:15%;">
                             <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" id="NombreUsuario" name="NombreUsuario" placeholder="Escribe aquí tu nombre." required=""></div><br>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="ApellidosUsuario">Apellidos</label>
                    <div class="controls" style="position:relative; right:15%;">
                             <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" id="ApellidosUsuario" name="ApellidosUsuario" placeholder="Escribe aquí tus apellidos." required=""></div><br>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="PasswordUsuario">Contraseña</label>
                    <div class="controls" style="position:relative; right:15%;">
                            <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span> <input type="password" id="PasswordUsuario" name="PasswordUsuario" placeholder="Contraseña." required="" minlength="8" maxlength="16"></div><br>
                    </div>
             </div>
             <div class="control-group">
                    <label class="control-label" for="ConfirmarPasswordUsuario">Confirma tu contraseña</label>
                    <div class="controls" style="position:relative; right:15%;">
                            <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span> <input type="password" id="ConfirmarPasswordUsuario" name="ConfirmarPasswordUsuario" placeholder="Repite la contraseña." required="" data-validation-match-match="PasswordUsuario" data-validation-match-message="Las contraseñas no coinciden."></div><br>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label">Género</label>
                    <div class="controls">
                            <input type="hidden" id="gender" name="GeneroUsuario" value="M">
                            <div class="btn-group genderDiv" data-toggle="buttons-radio" style="position:relative; right:56%;">
                                    <button type="button" class="btn btn-inverse btn-active" value="1">Hombre</button>
                                    <button type="button" class="btn btn-inverse" value="2">Mujer</button>
                            </div>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="NacimientoUsuario">Fecha de nacimiento</label>
                    <div class="controls" style="position:relative; right:15%;">
                            <div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span><input type="date" id="signupDOB" name="NacimientoUsuario" placeholder="Escribe tu fecha de nacimiento." required=""></div><br>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="TrabajoUsuario">Centro de trabajo</label>
                    <div class="controls" style="position:relative; right:15%;">
                            <div class="input-prepend"><span class="add-on"><i class="icon-globe"></i></span><input type="text" id="signupCountry" name="TrabajoUsuario" placeholder="Escribe tu centro de trabajo." required=""></div><br>
                    </div>
            </div>
            
            <button type="submit" class="btn btn-success" style="position:absolute; left:40%;">Terminar</button>
    </form>
    
</div>