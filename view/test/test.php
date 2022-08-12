<html>
<body>
    <form>
        <label>correo</label>
        <input type="text" id="username">
        <label>contraseña</label>
        <input type="password" id="password">
        <button type="submit" id="submit-login">Iniciar sesion</button>
        <p id="respuesta"></p>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo constant('URLJS');?>login.js?6"></script>
</body>
</html>