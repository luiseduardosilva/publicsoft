import { EtapaService } from './etapa.service';
import { Etapa } from './etapa.module';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-etapa',
  templateUrl: './etapa.component.html',
  styleUrls: ['./etapa.component.css']
})
export class EtapaComponent implements OnInit {

  etapas$: Observable <Etapa[]>;
 
  constructor(private EtapasService: EtapaService){

  }

  ngOnInit(){
     this.getEtapas();
  }

  getEtapas(){
      this.etapas$ = this.EtapasService.getEtapas()
  }
  
  addEtapa(nome: string){
    let c = {nome};
    this.EtapasService.saveEtapa(c)
      .subscribe((c: Etapa) => console.log(c));
    
    this.getEtapas(); 
  }
 
  removerEtapa(e: Etapa){
    this.EtapasService.removerEtapa(e)
      .subscribe((e: Etapa) => console.log(e));
    this.getEtapas();
  }
}
