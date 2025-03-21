import { Routes } from '@angular/router';
import { TiendaComponent } from './vista-general/tienda/tienda.component';
import { TarifaComponent } from './vista-general/tarifa/tarifa.component';
import { EntrenosComponent } from './vista-general/entrenos/entrenos.component';
import { InicioComponent } from './vista-general/inicio/inicio.component';
import { LoginComponent } from './vista-general/login/login.component';
import { paginasRestringidasGuard } from './vista-general/guards/paginas-restringidas.guard';
import { CarritoComponent } from './vista-general/carrito/carrito.component';
import { AdministracionComponent } from './vista-general/administracion/administracion.component';

export const routes: Routes = [
    //Ruta por defecto
    {path:"",title:"login",component:LoginComponent},
    //Ruta Inicio
    {path:"inicio",title:"Inicio",component:InicioComponent},
    //Ruta tienda
    {path:"tienda",title:"Tienda",component:TiendaComponent, canActivate:[paginasRestringidasGuard]},
    //Ruta carrito de la tienda
    {path:"carrito",title:"Carrito",component:CarritoComponent},
    //Ruta tarifa
    {path:"tarifa",title:"Tarifa",component:TarifaComponent},
    //Ruta Entreno
    {path:"entreno",title:"Entreno",component:EntrenosComponent,canActivate:[paginasRestringidasGuard]},
    //Ruta administracion
    {path:"administracion",title:"Administracion",component:AdministracionComponent,canActivate:[paginasRestringidasGuard]}
];
