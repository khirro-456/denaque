@extends('layouts.app')

@push('styles')
<style>
/* Slideshow container styling */
#slideshow-container {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  width: 100vw;
  height: 100vh;
  z-index: -1;
  overflow: hidden;
}

/* Each slide image styling */
#slideshow-container .slide {
  position: absolute;
  width: 100vw;
  height: 100vh;
  object-fit: cover;
  opacity: 0;
  transition: opacity 1s ease;
}

/* Active slide */
#slideshow-container .slide.active {
  opacity: 1;
}

/* Keep card content above slideshow */
.card {
  position: relative;
  z-index: 100;
}
</style>
@endpush

@section('content')
  <!-- Background slideshow -->
  <div id="slideshow-container">
    <img src="/images/bg1.jpg" class="slide active" alt="Background Image 1" />
    <img src="/images/bg2.jpg" class="slide" alt="Background Image 2" />
    <img src="/images/bg3.jpg" class="slide" alt="Background Image 3" />
    <img src="/images/bg4.jpg" class="slide" alt="Background Image 4" />
  </div>

  <div class="card" style="text-align: center;">
      <h1 style="color: #4a5568; margin-bottom: 1rem; font-size: 2.5rem;">Welcome to Free Diamond</h1>
      <p style="color: #718096; font-size: 1.1rem; margin-bottom: 2rem;">
          Get your free diamond reward! Click the button below to start your journey.
      </p>
      
      <a href="{{ route('register') }}" class="btn btn-primary" style="font-size: 1.2rem; padding: 16px 32px;">
          Get Free Diamond
      </a>
      
      <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
          <p style="color: #a0aec0; font-size: 0.9rem;">
              don't have an account?
              <a href="{{ route('login') }}" style="color: #667eea; text-decoration: none; font-weight: 600;">
                  create here
              </a>
          </p>
      </div>
  </div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const slides = document.querySelectorAll('#slideshow-container .slide');
    let currentIndex = 0;
    const totalSlides = slides.length;
    const interval = 4000; // 4 seconds
    
    setInterval(() => {
      slides[currentIndex].classList.remove('active');
      currentIndex = (currentIndex + 1) % totalSlides;
      slides[currentIndex].classList.add('active');
    }, interval);
  });
</script>
@endpush
