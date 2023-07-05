import { Component, inject } from '@angular/core';
import { RefresherCustomEvent } from '@ionic/angular';
import { BrokerBackendService } from 'src/app/services/brocker-backend.service'
import { Observable } from 'rxjs';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  private backend = inject(BrokerBackendService);
  public page: number = 1
  public news: any = []
  public state: string = 'recents'
  
  constructor() {}

  refresh(ev: any) {
    setTimeout(() => {
      (ev as RefresherCustomEvent).detail.complete();
    }, 3000);
  }

  async ngOnInit() {
    
    this.getRecentsFromBackend()  
  }

  async showsRecents(){
    this.state = 'recents'
    this.getRecentsFromBackend()
  }

  async showsMostViewed(){
    this.state = 'most_viewed'
    this.getMostViewdFromBackend()
  }

  showsNextPage() {
    this.page += 1

    if(this.state == 'recents'){

      this.getRecentsFromBackend()
    } 
    else {

      this.getMostViewdFromBackend() 
    }
  }

  showsPreviousPage() {
    this.page -= 1

    if(this.state == 'recents'){

      this.getRecentsFromBackend()
    } 
    else {

      this.getMostViewdFromBackend() 
    }
  }

  async getRecentsFromBackend() {
    const resultado =  this.backend.connectInBackend('/api/noticias/recentes?page=' + this.page, 'GET' ).subscribe(result => {
      this.news = result
    });  
  }

  async getMostViewdFromBackend() {   
    const resultado =  this.backend.connectInBackend('/api/noticias/mais_visualizadas?page=' + this.page, 'GET' ).subscribe(result => {
      this.news = result
    })
  
  }
}
