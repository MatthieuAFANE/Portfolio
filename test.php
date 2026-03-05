<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thumbnail Carousel</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body { font-family: sans-serif; background: #f0f0f0; display: flex; justify-content: center; padding: 2rem; }

    .carousel-container {
      width: 90%;
      max-width: 900px;
      overflow: hidden;
      position: relative;
      border-radius: 10px;
    }

    .carousel-track {
      display: flex;
      transition: transform 0.5s ease;
      cursor: grab;
      user-select: none;
    }

    .carousel-item {
      min-width: 100%;
      flex-shrink: 0;
      height: 400px;
      
      overflow: hidden;
      position: relative;
    }

    .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      pointer-events: none;
      user-select: none;
    }

    .btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255,255,255,0.8);
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .btn:hover { transform: translateY(-50%) scale(1.1); }

    .btn svg { width: 20px; height: 20px; }

    .btn-left { left: 10px; }
    .btn-right { right: 10px; }

    .thumbnails {
      display: flex;
      gap: 4px;
      margin-top: 10px;
      overflow-x: auto;
      scrollbar-width: none;
    }
    .thumbnails::-webkit-scrollbar { display: none; }

    .thumbnail {
      flex-shrink: 0;
      height: 60px;
      width: 60px;
      overflow: hidden;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s;
      border: 2px solid transparent;
    }

    .thumbnail img { width: 100%; height: 100%; object-fit: cover; }

    .thumbnail.active { border-color: #ff6ec7; transform: scale(1.1); }

    .counter {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(0,0,0,0.5);
      color: #fff;
      padding: 4px 10px;
      border-radius: 12px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="carousel-container">
    <div class="carousel-track"></div>
    <button class="btn btn-left"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></button>
    <button class="btn btn-right"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></button>
    <div class="counter"></div>
    <div class="thumbnails"></div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
  <script>
    const items = [
      { id: 1, url: 'https://plus.unsplash.com/premium_photo-1712685912272-96569030d1d7?w=1175&q=80', title: 'Water & Mountains' },
      { id: 2, url: 'https://plus.unsplash.com/premium_photo-1761478617343-12a3dd981cf6?w=1175&q=80', title: 'Abstract Streaks' },
      { id: 3, url: 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=880&h=600&fit=crop', title: 'Mountain Summit' },
      { id: 4, url: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=880&h=600&fit=crop', title: 'Alpine Landscape' },
      { id: 5, url: 'https://images.unsplash.com/photo-1519904981063-b0cf448d479e?w=880&h=600&fit=crop', title: 'Mountain Range' }
    ];

    const track = document.querySelector('.carousel-track');
    const thumbnailsContainer = document.querySelector('.thumbnails');
    const counterEl = document.querySelector('.counter');
    let currentIndex = 0;

    function renderCarousel() {
      track.innerHTML = '';
      items.forEach(item => {
        const div = document.createElement('div');
        div.classList.add('carousel-item');
        const img = document.createElement('img');
        img.src = item.url;
        img.alt = item.title;
        div.appendChild(img);
        track.appendChild(div);
      });
    }

    function renderThumbnails() {
      thumbnailsContainer.innerHTML = '';
      items.forEach((item, i) => {
        const thumb = document.createElement('div');
        thumb.classList.add('thumbnail');
        if(i === currentIndex) thumb.classList.add('active');
        thumb.addEventListener('click', () => { goToIndex(i); });
        const img = document.createElement('img');
        img.src = item.url;
        thumb.appendChild(img);
        thumbnailsContainer.appendChild(thumb);
      });
    }

    function updateCounter() {
      counterEl.textContent = `${currentIndex + 1} / ${items.length}`;
    }

    function goToIndex(index) {
      currentIndex = index;
      const offset = -index * track.offsetWidth;
      gsap.to(track, { x: offset, duration: 0.5, ease: "power2.out" });
      renderThumbnails();
      updateCounter();
    }

    document.querySelector('.btn-left').addEventListener('click', () => {
      if(currentIndex > 0) goToIndex(currentIndex - 1);
    });

    document.querySelector('.btn-right').addEventListener('click', () => {
      if(currentIndex < items.length - 1) goToIndex(currentIndex + 1);
    });

    // Drag functionality
    let isDragging = false;
    let startX = 0;
    let currentX = 0;

    track.addEventListener('mousedown', (e) => {
      isDragging = true;
      startX = e.clientX;
      track.style.cursor = 'grabbing';
    });

    track.addEventListener('mouseup', (e) => {
      if(!isDragging) return;
      isDragging = false;
      track.style.cursor = 'grab';
      const dx = e.clientX - startX;
      if(dx > 100 && currentIndex > 0) goToIndex(currentIndex - 1);
      else if(dx < -100 && currentIndex < items.length - 1) goToIndex(currentIndex + 1);
      else goToIndex(currentIndex);
    });

    track.addEventListener('mouseleave', () => {
      if(isDragging) {
        isDragging = false;
        goToIndex(currentIndex);
        track.style.cursor = 'grab';
      }
    });

    track.addEventListener('mousemove', (e) => {
      if(!isDragging) return;
      currentX = e.clientX;
      const dx = currentX - startX;
      gsap.set(track, { x: -currentIndex * track.offsetWidth + dx });
    });

    renderCarousel();
    renderThumbnails();
    updateCounter();
    goToIndex(0);

    window.addEventListener('resize', () => { goToIndex(currentIndex); });
  </script>
</body>
</html>
