templates laravel blade para el envio de correo

si desea cambiar el estilo del correo o el mensaje lo hace con los archivos
de esta carpeta y al finalizar realize una copia del archivo con el mismo nombre en la carpeta view
y vaya a la pagina
https://foundation.zurb.com/emails/inliner-v2.html
pegue el contenido html nuevo y le generara un archio html comprimido
copeelo y peguelo en el archivo con el mismo nombre en la carpeta view

debe reemplazar los campos [blade] con sintaxis de blade {{ $var }}

debe guiarse por el archivo copia para el nombre de las variables


para poder previsualizar el template cree una ruta en el archivo web y haga uso del metodo
seeMail del controlador MailController