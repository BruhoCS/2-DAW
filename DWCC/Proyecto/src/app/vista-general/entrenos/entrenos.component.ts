import { Component } from '@angular/core';
import { EntrenoManualComponent } from "./entreno-manual/entreno-manual.component";
import { EntrenosIAComponent } from "./entreno-ia/entreno-ia.component";
import { CommonModule } from '@angular/common';
import { ChatbotComponent } from "./chatbot/chatbot.component";

@Component({
  selector: 'app-entrenos',
  standalone: true,
  imports: [EntrenoManualComponent, CommonModule, ChatbotComponent],
  templateUrl: './entrenos.component.html',
  styleUrl: './entrenos.component.css'
})
export class EntrenosComponent {

  cambiarEntreno:boolean = true;

  cambiarTipoEntreno(){
      this.cambiarEntreno = !this.cambiarEntreno;
  }
}
