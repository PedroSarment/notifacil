import { Component, inject, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { BrokerBackendService } from 'src/app/services/brocker-backend.service'

@Component({
  selector: 'app-news',
  templateUrl: './news.page.html',
  styleUrls: ['./news.page.scss'],
})
export class NewsPage implements OnInit {

  private activatedRoute = inject(ActivatedRoute);
  private backend = inject(BrokerBackendService);
  public news: any = null
  public id: string = '';

  constructor() {}

  async ngOnInit() {
    this.id = this.activatedRoute.snapshot.paramMap.get('id') as string;
    this.getNewsFromBackend()
  }

  async getNewsFromBackend() {  
    const resultado =  this.backend.connectInBackend('/api/noticias/' + this.id, 'GET' ).subscribe(result => {
     
      this.news = result
    })
  }

  formatCreatedAt(created_at: string): string {  
    const date = new Date(created_at);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');

    return `${day}/${month}/${year} ${hours}:${minutes}`;
  }

}
