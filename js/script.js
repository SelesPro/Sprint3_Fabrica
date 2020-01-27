var abrir_btn= document.getElementById("agregar");
var overlay = document.getElementById("overlay");
var cerrar_btn = document.getElementById("cancelar");

abrir_btn.addEventListener('click',function(){
	overlay.classList.add('active');
});

cerrar_btn.addEventListener('click',function(){
	overlay.classList.remove('active');
});
