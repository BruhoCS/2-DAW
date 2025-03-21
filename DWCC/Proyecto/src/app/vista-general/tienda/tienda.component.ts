import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Productos } from '../modelo/productos';
import { ProductosTiendaService } from '../../servizos/productos-tienda.service';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-tienda',
  standalone: true,
  imports: [CommonModule,RouterLink],
  templateUrl: './tienda.component.html',
  styleUrl: './tienda.component.css'
})

export class TiendaComponent implements OnInit{

  productosComida: Productos[]=[];//Array que almacenará a comida provenientes de la subscripcion al servicio
  productosSuplementos: Productos[]=[];//Array que almacenará os suplementos provenientes de la subscripcion al servicio
  productosAccesorios: Productos[]=[];//Array que almacenará os accesorios provenientes de la subscripcion al servicio

  //Variables que aportarán lógica al carrito de la compra
  productoAnhadir: Productos[] = [];//Array no que almacenaremos os productos que se engadiran ao carrito
  mostrarCarro: boolean = false;//Variable que controla se se amosa ou non o carrito
  total:number = 0; // Variable que almacenará el total del carrito de la compra

  //Constructor para hacer uso del servicio
  constructor(private servicio:ProductosTiendaService){

  }
  //Funcion que ocultará o mostrará el carrito según el valor booleano
  mostrarCarrito() {
    this.mostrarCarro = !this.mostrarCarro;
  }

  //Función que añadirá el producto seleccionado al carrito
  anhadirAlCarro(producto: Productos) {
    this.productoAnhadir.push(producto);
    this.total =this.total+producto.precio;
  }

  //Función que eliminará todos los productos del carrito
  vaciarCarro() {
    this.productoAnhadir = [];
    this.total = 0;
  }

  //Función para subscribirse al servicio y obtener los datos
  ngOnInit(): void {
    //Nos subscribimos al servicio de productos para que el array siempre estea actualizado
      //SUSCRIPCIÓN COMIDA
    this.servicio.subscribirseComida$().subscribe((comida) => {
        this.productosComida = comida;
        
    });
      //SUSCRIPCIÓN SUPLEMENTOS
    this.servicio.subscribirseSuplemento$().subscribe((suplementos)=>{
      this.productosSuplementos = suplementos;
    })
      //SUSCRIPCIÓN ACCESORIOS
    this.servicio.subscribirseAccesorio$().subscribe((accesorios)=>{
      this.productosAccesorios = accesorios;
    })
  }
}