fetch(window.location.origin + '/wp-json/wp/v2/posts')
  .then(response => response.json())
  .then(posts => {
    const container = document.getElementById('api-posts');
    posts.forEach(post => {
      const div = document.createElement('div');
      div.innerHTML = `<h3>${post.title.rendered}</h3><p>${post.excerpt.rendered}</p>`;
      container.appendChild(div);
    });
  })
  .catch(error => console.error('Error fetching posts:', error));
