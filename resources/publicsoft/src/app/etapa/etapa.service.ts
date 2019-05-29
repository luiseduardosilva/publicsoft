import { Etapa } from './etapa.module';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class EtapaService {

  readonly url: string = "http://localhost:8000/api";

  constructor(private http: HttpClient) { }

  getEtapas(): Observable <Etapa[]> {
    return this.http.get<Etapa[]>(`${this.url}/etapas`);
  }

  saveEtapa(e: Etapa): Observable <Etapa>{
    return this.http.post<Etapa>(`${this.url}/etapas`, e);
  }

  removerEtapa(e: Etapa): Observable <Etapa>{
    return this.http.delete<Etapa>(`${this.url}/etapas/${e.id}`);
  }
}
