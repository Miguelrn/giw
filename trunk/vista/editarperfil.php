<?php session_start(); ?>
<form style="text-align: center" name="register" action="controlador/cambiarperfil.php" method="POST" accept-charset="utf-8">  
    <p class="fuenteTitulo" id="registration_title_form">
        Editar perfil en Smart Music
    </p>
    <div id="registration_element_form">
        <div id="registration_element_form">                 
            <input type="text" maxlength="20" name="nombre" 
            placeholder="Nombre"
            value="<?php echo $_SESSION['nombre']; ?>" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="text" maxlength="30" name="apellidos" 
            placeholder="Apellidos" 
            value="<?php echo $_SESSION['apellidos']; ?>" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="text" maxlength="4" name="edad" 
            placeholder="Edad" 
            value="<?php echo $_SESSION['edad']; ?>" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="email" maxlength="40" name="correo" disabled="true"
            placeholder="Correo"
            value="<?php echo $_SESSION['correo']; ?>">
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="text" maxlength="100" name="domicilio" 
            placeholder="Domicilio" 
            value="<?php echo $_SESSION['domicilio']; ?>" required="">
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="text" maxlength="100" name="datosBancarios" 
             placeholder="Datos bancarios"
             value="<?php echo $_SESSION['datosBancarios']; ?>" required="">
        </div>
        </br>
        <div id="registration_element_form">                 
            <input class="button button_large type" name="enviar" type="submit" value="Cambiar datos del perfil">
        </div>     
    </div>  
</form>
<form style="text-align: center" name="register" action="controlador/cambiarcontrasena.php" method="POST" accept-charset="utf-8">  
    <p class="fuenteTitulo" id="registration_title_form">
        Cambiar contraseña en Smart Music
    </p>
    <div id="registration_element_form">
    	<div id="registration_element_form">                 
            <input type="hidden" name="correo" value="<?php echo $_SESSION['correo']; ?>" required="">
        </div>
        <div id="registration_element_form">                 
            <input type="password" maxlength="12" name="antiguopass" placeholder="Antigua contraseña" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="password" maxlength="12" name="nuevopass" placeholder="Nueva contraseña" required="">            
        </div>
        </br>
        <div id="registration_element_form">                 
            <input type="password" maxlength="12" name="repitenuevopass" placeholder="Repite nueva contraseña" required="">
        </div>
        </br>
        <div id="registration_element_form">                 
            <input class="button button_large type" name="enviar" type="submit" value="Cambiar contraseña">
        </div>     
    </div>  
</form>