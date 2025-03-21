import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { Entreno } from '../../modelo/entreno';

@Component({
  selector: 'app-entreno-manual',
  standalone: true,
  imports: [ReactiveFormsModule,CommonModule],
  templateUrl: './entreno-manual.component.html',
  styleUrl: './entreno-manual.component.css'
})
export class EntrenoManualComponent {
  //Clase formGroup para obter o formulario reactivo
  formulario:FormGroup;
  //Array para almacear a informacion introducida polo formulario
  listaEntrenos: Entreno[] = [];


  constructor() {
    //Inicializamos o formgroup "formulario" indicando que campos ten e como corresponden distintos controis de formulario no html
    this.formulario = new FormGroup({
      dia: new FormControl(),
      grupo_muscular: new FormControl(),
      ejercicio: new FormControl(),
      repeticiones: new FormControl(),
      duracion:new FormControl(),
      tipo:new FormControl(),
      descanso:new FormControl(),
      
    });
  }

  cargarEntreno(){
    //recheamos o array cos datos introducidos 
    this.listaEntrenos.push(this.formulario.value); 
    //Reseteamos o formulario
    this.formulario.reset();
  }

  eliminarEntreno(){
    this.listaEntrenos = [];
  }

  descargarEntreno(){
    console.log("descarga en curso...");
  }
}
