<form style="text-align: center" name="register" action="controlador/registrar.php" method="POST" accept-charset="utf-8">  
    <p class="fuenteTitulo" id="registration_title_form">
        Registro en Smart Music
    </p>
    <div id="registration_element_form">
        <div id="registration_element_form">                 
            <input type="text" maxlength="20" name="nombre" placeholder="Nombre" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="text" maxlength="40" name="apellidos" placeholder="Apellidos" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="text" maxlength="3" name="edad" placeholder="Edad" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="email" maxlength="100" name="correo" placeholder="Correo" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="password" maxlength="14" name="pass" placeholder="Contraseña" required="">
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="password" maxlength="14" name="reppass" placeholder="Repite la contraseña" required="">
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="text" maxlength="200" name="domicilio" placeholder="Domicilio" required="">
        </div>
        </br>
        <div id="registration_element_form">                 
            <input class="button button_large type" name="enviar" type="submit" value="Enviar">
        </div>     
    </div>  
</form>