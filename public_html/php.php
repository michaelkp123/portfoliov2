<div id="instagram-feed"></div>

<script>
  <?php
    $accessToken = 'IGQVJYQzRWTThuelJJWkJPYTc1TFZAsSkFLNjUzMS1LY0RLd0tiZAlZAhLWM0LVhuaExUbzFvUjAtanR4ekQ4MHJjUVJtOWVaRV9wNW9zUjdybnhibDFpNVVFOXFaVTJmUGd6YTVwaFktWFlSNmRGYmd1VQZDZD';
    echo "const accessToken = '$accessToken';";
  ?>

  fetch(`https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url&access_token=${accessToken}`)
    .then(response => response.json())
    .then(data => {
      const feedContainer = document.getElementById('instagram-feed');

      if (data.data && Array.isArray(data.data)) {
        data.data.forEach(item => {
          if (item.media_type === 'IMAGE') {
            const image = document.createElement('img');
            image.src = item.media_url;
            feedContainer.appendChild(image);
          }
        });
      } else {
        console.error('Ingen data fundet i API-responsen.');
      }
    })
    .catch(error => {
      console.error(error);
    });
</script>