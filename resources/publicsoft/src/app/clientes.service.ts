import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Cliente }    from './cliente.module';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ClientesService {

  readonly url: string = "http://localhost:8000/api";
  constructor(private http: HttpClient) { }

  getClientes(): Observable <Cliente[]> {
    return this.http.get<Cliente[]>(`${this.url}/clientes`);
  }

  saveCliente(c: Cliente): Observable <Cliente>{
    return this.http.post<Cliente>(`${this.url}/clientes`, c);
  }

  removerCliente(c: Cliente): Observable <Cliente>{
    return this.http.delete<Cliente>(`${this.url}/clientes/${c.id}`);
  }
}
