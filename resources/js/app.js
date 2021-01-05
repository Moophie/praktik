require('./bootstrap');

Vue.component('post', {
    data: function () {
        return {
            newComment: ""
        }
    },
    template: `<div class='post'>
        <h2 class="post__user">{{post.user.username}}</h2>
        <img class='post__image' v-bind:src="post.image">
        <h3 class='post__likes'>
          <a href="#" class="fa fa-heart-o"></a>
          
          {{post.likes}} likes
        </h3>    
        <div class='comments' >
          <div class='comment' v-for="comment in post.comments"><strong>{{comment.username}}</strong> {{comment.text}}</div>
          <input v-model="newComment" v-on:keyup.13.prevent="addComment(newComment)" type="text" class="post__commentText">
        </div>
      </div>`,
    methods: {
        addComment: function (newComment) {
            var comment = {
                username: "goodbytes",
                text: newComment
            };
            this.post.comments.push(comment);
            this.newComment = ""; 
        }
    },
    props: ['post']
});

var app = new Vue({
    el: "#app",
    data: {
        posts: []
    },
    mounted: function () {
        this.getPosts();
        console.log(this.getPosts());
    },
    methods: {
        addComment: function () {
        },
        getPosts: function () {
            var that = this;
            fetch('https://gist.githubusercontent.com/iamgoodbytes/c6ff3231bbb3cf4e6f292021413379cd/raw/aca385bd5cfca3e39bf352477c7b90e50fb4ad9e/fake-instagram-post-json.json')
                .then(res => {
                    return res.json();
                })
                .then(json => {
                  console.log(json);
                    that.posts.push(json.data.post);
                })
        }
    }
});