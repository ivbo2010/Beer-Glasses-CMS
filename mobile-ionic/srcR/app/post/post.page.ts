import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { PostsService } from '../services/posts.service';

export interface Post {
	likes:number,
	description: string,
	image: string,
}

@Component({
  selector: 'app-post',
  templateUrl: './post.page.html',
  styleUrls: ['./post.page.scss'],
})

export class PostPage implements OnInit {

	post_form: FormGroup;
	post: Post;
  constructor(public fb: FormBuilder, public route: ActivatedRoute, public post_service: PostsService) {
    this.post_form = this.fb.group({
      image: [null],
      description: [null],
      likes: [0]
    });
  }

  ngOnInit() {
    let id: number = Number(this.route.snapshot.paramMap.get('id'));
    if (id !== -1) {
      this.post_service.getPost(id).subscribe((res) => {
        this.post = res.data;
        console.log(this.post)
      })
    } else { this.post = null; }
  }

  addPost():any{
    console.log(this.post_form.value);
		this.post_service.createPost(this.post_form.value).subscribe( (res) => {
      console.log(res);
      if(res.status == 200){
        window.location.href = 'http://localhost:8100/home'; //o correto é importar uma router e não fazer isso!!!
      }
    })
  }

  //atualizar um Post no bd
	updatePost(id: number):any{
    console.log(this.post_form.value);
		this.post_service.updatePost(id, this.post_form.value).subscribe( (res) => {
      console.log(res);
      if(res.status == 200){
        alert('Post atualizado');
      }
    });
	}

	updateImage():any{
		// let value: string = document.getElementById('imageInput').value;
    // document.getElementById('imageDisplay').setAttribute('src', value);
    console.log('oi');
	}
}
