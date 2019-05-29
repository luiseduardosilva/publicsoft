import { Cliente } from './cliente.module';
import { Observable } from 'rxjs';
import { ClientesService } from './clientes.service';
import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'publicsoft';
  
  clientes$: Observable <Cliente[]>;
 
  constructor(private ClientesService: ClientesService){

  }

  ngOnInit(){
     this.getClientes();
  }

  getClientes(){
      this.clientes$ = this.ClientesService.getClientes();
  }

  
  addCliente(nome: string, cnpj: string){
    let c = {nome, cnpj};
    this.ClientesService.saveCliente(c)
      .subscribe((c: Cliente) => console.log(c));
    
    this.getClientes();
    
  }
 
  removerCliente(c: Cliente){
    this.ClientesService.removerCliente(c)
      .subscribe((c: Cliente) => console.log(c));
    this.getClientes();
  }

  
}
