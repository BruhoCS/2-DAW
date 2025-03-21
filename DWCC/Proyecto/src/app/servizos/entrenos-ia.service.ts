import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EntrenosIaService {

  //Direccion url
  private apiUrl = 'https://api.openai.com/v1/chat/completions';
  // Api key para el chatbot
  private apiKey = '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';
  
  //Hacemos uso de BehaviorSubject para almacenar la respuesta de la IA
  private respuestaApi$ = new BehaviorSubject<string>('');

  //Constructor
  constructor(private entrenoIa: HttpClient) { }

  //Función que recibe un mensaje de tipo string el cual será la solicitud que se enviará a la API para generar una rutina personalizada
  generarRutina(mensaje: string){
    //Cuerpo de la petición
      //Se crea un objeto body que contiene los datos que se enviarán en la solicitud HTTP
    const body ={
      model: 'gpt-3.5-turbo',// Modelo de la IA que se usará para generar la respuesta
      messages:[{role:'user',content: mensaje}],// Historial de la conversación(rol->Indica que el mensaje lo está enviando el usuario y content->Es el contenido)
      temperature: 0.7// Controla la aleatoriedad de la respuesta
    }

    // Se crea un objeto header con los encabezados HTTP necesarios para la solicitud
    const headers = new HttpHeaders({
      'Content-Type': 'application/json',// Los datos se envian en formato JSON
      'Authorization': `Bearer ${this.apiKey}`// Se agrega el token de autenticación (solicitado en la página de la API)
    });

    // Enviamos y manejamos la solicitud de la API y se maneja la respuesta
    this.entrenoIa.post<any>(this.apiUrl, body, { headers }).subscribe(
      res => this.respuestaApi$.next(res.choices[0].message.content), // En caso de que responda correctamente se almacena en el BehaviorSubject(respuestaApi$)
      err => this.respuestaApi$.next('Error al generar la rutina debio a posible sobrecarga de peticiones o fallo de conexión')// En caso de erro se guarda un mensaje de error
    );
  }

  // Este método será el que permita hacer solicitudes HTTP indicando una url
  obtenerApi():Observable<string>{
    // Se devuelve la respuesta como un observable
    return this.respuestaApi$.asObservable();
  }
}
