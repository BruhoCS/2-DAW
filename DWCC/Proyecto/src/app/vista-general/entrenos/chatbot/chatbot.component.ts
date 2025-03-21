import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { EntrenosIaService } from '../../../servizos/entrenos-ia.service';
import { EntrenosIAComponent } from "../entreno-ia/entreno-ia.component";

@Component({
  selector: 'app-chatbot',
  standalone: true,
  imports: [CommonModule, FormsModule, EntrenosIAComponent],
  templateUrl: './chatbot.component.html',
  styleUrl: './chatbot.component.css'
})
export class ChatbotComponent {
  //Enviar mensaje
  mensaje: string = "";
  //Boton
  botonDeshabilitado: boolean;

  constructor(private servicio: EntrenosIaService) { }
  //Funcion que enviará el mensaje del usuario a la IA
  enviarMensaje() {
    //Si hay mensaje
    if (this.mensaje.trim()) {
      //Para evitar que se hagan consultas muy seguidas 
      this.botonDeshabilitado = true;//Deshabilitaremos el boton de forma temporal
      //Utilizaremos setTimeout para dar ese margen al chat y habilitar el botón una vez acabe el timepo
      setTimeout(()=>{
        this.servicio.generarRutina(this.mensaje);
        this.botonDeshabilitado = false;
      },5000)// Con esto evitaremos el spam de mensajes a la API
      
    }
  }
}
