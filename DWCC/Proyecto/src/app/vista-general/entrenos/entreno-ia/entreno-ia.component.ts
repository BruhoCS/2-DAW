import { Component, OnInit } from '@angular/core';
import { EntrenosIaService } from '../../../servizos/entrenos-ia.service';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ChatbotComponent } from "../chatbot/chatbot.component";

@Component({
  selector: 'app-entreno-ia',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './entreno-ia.component.html',
  styleUrl: './entreno-ia.component.css'
})
export class EntrenosIAComponent implements OnInit {
  //Mensaje recibido
  chat:string = "";

  constructor(private servicio: EntrenosIaService){}

  ngOnInit() {
    // Nos subscribimos para obtener la rutina generada
    this.servicio.obtenerApi().subscribe(respuesta =>{
      this.chat = respuesta;//Igualamos nuestra variable para obtener la respuesta actualizada
    });
  }
}
