@extends('master')
@section('content')
<div class="row mt-5">
  <div class="col-md-5 mr-auto">
      <h2>Contact Us</h2>
      <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quaerat autem corrupti asperiores accusantium et fuga! Facere excepturi, quo eos, nobis doloremque dolor labore expedita illum iusto, aut repellat fuga!</p>

      <ul class="list-unstyled pl-md-5 mb-5">
          <li class="d-flex text-black mb-2">
              <span class="mr-3"><i class="ti-map-alt"></i></span> 34 Street Name, City Name Here, <br> United States
          </li>
          <li class="d-flex text-black mb-2"><span class="mr-3"><i class="ti-headphone-alt"></i></span> +1 (222) 345 6789</li>
          <li class="d-flex text-black"><span class="mr-3"><i class="ti-email"></i></span> info@mywebsite.com </li>
      </ul>
  </div>

  <div class="col-md-6">
      <form class="mb-5" method="post" id="contactForm" name="contactForm">
          <div class="row">

              <div class="col-md-12 form-group">
                  <label for="name" class="col-form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 form-group">
                  <label for="email" class="col-form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="email">
              </div>
          </div>

          <div class="row">
              <div class="col-md-12 form-group">
                  <label for="message" class="col-form-label">Message</label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="7"></textarea>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
              </div>
          </div>
      </form>

      <div id="form-message-warning mt-4"></div>
      <div id="form-message-success">
          Your message was sent, thank you!
      </div>
  </div>
</div>
@endsection