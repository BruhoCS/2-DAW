//Elementos do obxeto
var nome = document.getElementById('nome');
var apelidos = document.getElementById('apelidos');
var telefono = document.getElementById('telefono');
var email = document.getElementById('email');
var enderezo = document.getElementById('enderezo');
var comentarios = document.getElementById('comentarios');

//array para almacear contactos
var listaContactos=[];

//elemento para resetear o formulario
var formulario = document.getElementById("formulario-contactos");

//Funcions do boton de "Engadir Contacto"
function engadirContacto(){
    //Crear var para enlazar co formulario
    let valorNome = nome.value;
    let valorApelidos= apelidos.value;
    let valorTelefono= telefono.value;
    let valorEmail= email.value;
    let valorEnderezo= enderezo.value;
    let valorComentarios= comentarios.value;
    
    //Obxeto contacto
    contacto = {
        //Atributos
        nome: nome.value,
        apelidos: apelidos.value,
        telefono: telefono.value,
        email: email.value,
        enderezo:enderezo.value,
        comentarios : comentarios.value
    }
    
    //Rellenar array
    listaContactos.push(contacto);
    
    //Imprimir por pantalla(Axenda contactos)
    actualizarContactos(listaContactos);

    //Resetear formulario
    formulario.reset();
   
}

function actualizarContactos(listaContactos){
    var etiqueta;
    //cambia o contido do div por " " e logo se reescribe
    document.getElementById("listaxe-contactos").innerHTML = " ";
    //recorrer obxeto
    listaContactos.forEach(contacto => {
        //Escribir no array
        var textoContactos = `Nome: ${contacto.nome}, Apelidos: ${contacto.apelidos},Telefono: ${contacto.telefono},Email: ${contacto.email},Enderezo: ${contacto.enderezo}, Comentarios: ${contacto.comentarios}`;
        //crear nova etiqueta no html
        let lista = document.getElementById("listaxe-contactos");
        etiqueta = document.createElement('p');
        //Indicar que contiene
        etiqueta.textContent = textoContactos;
        //hacer a lista(la nueva etiqueta) "hijo" del div "listaxe-contactos"
        lista.appendChild(etiqueta);
    });
}

//Funcionalidade do boton (Buscar Contacto)
function buscarContacto() {
    //Variable buscar elemento en el html
    let contactoA_Buscar = document.getElementById('nome').value.toLowerCase();

    //Encontrar el dato pedido
    let contactoBuscado = listaContactos.find((contacto) => contacto.nome.toLowerCase() == contactoA_Buscar);

    //Condición cuando se encuentre el dato pedido
    if (contactoBuscado) {

        console.log(contactoBuscado);

        nome.value = contactoBuscado.nome;
        apelidos.value = contactoBuscado.apelidos;
        telefono.value = contactoBuscado.telefono;
        email.value = contactoBuscado.email;
        enderezo.value = contactoBuscado.enderezo;

    }
}
