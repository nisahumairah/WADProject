@extends('master.layout')

@section('content')
<main class="main">

  <!-- Motivation Header Section -->
  <section id="motivation-header" class="motivation-header section dark-background">
    <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up">
      <h1>Islamic Motivations</h1>
      <p>Share inspiring words from the Quran and Hadith</p>
    </div>
  </section>

  <!-- Add Motivation Form Section -->
  <section id="add-motivation" class="add-motivation section">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Add New Motivation</h2>
        <p>Contribute an inspiring Islamic quote</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          <form action="{{ route('motivations.store') }}" method="POST" class="php-email-form">
            @csrf
            <div class="row gy-4">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="quote">Motivational Quote</label>
                  <textarea class="form-control" id="quote" name="quote" rows="5" required 
                            placeholder="Enter an inspiring Quranic verse or Hadith..."></textarea>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="source">Source</label>
                  <input type="text" class="form-control" id="source" name="source" required
                         placeholder="e.g., Quran 2:286, Sahih Bukhari, etc.">
                </div>
              </div>
              
              <div class="col-md-12 text-center">
                <div class="d-flex justify-content-center gap-3">
                  <a href="{{ route('motivations.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to List
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Save Motivation
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection