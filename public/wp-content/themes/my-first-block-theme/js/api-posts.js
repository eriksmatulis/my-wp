fetch(window.location.origin + '/wp-json/wp/v2/posts')
  .then(response => response.json())
  .then(posts => {
    const container = document.getElementById('api-posts');
    posts.forEach(post => {
      const div = document.createElement('div');
      div.setAttribute("style", 
        `background-color: white; 
        max-width: 50%; 
        margin: auto; 
        color: black; 
        border-radius: 5px;
        padding-left: 1em;
        padding-bottom: 0.5em;
        text-align: center;
        `
      );
      div.innerHTML = `<h3>${post.title.rendered}</h3><p>${post.excerpt.rendered}</p>`;
      container.appendChild(div);
    });
  })
  .catch(error => console.error('Error fetching posts:', error));
