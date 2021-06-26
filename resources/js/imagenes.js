const imagen =document.getElementById('imagen');
imagen.addEventListener("change",(e)=>{
    leerArchivo(imagen.files[0]);
});

const leerArchivo=(ar)=>{
    const reader = new FileReader();
    
}