 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
     <div class="container" data-aos="fade-up">

         <div class="section-title">
             <h2>Contact</h2>
             <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                 consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                 fugiat sit in iste officiis commodi quidem hic quas.</p>
         </div>

         <div class="row">

             <div class="col-lg-5 d-flex align-items-stretch">
                 <div class="info">
                     <div class="address">
                         <i class="bi bi-geo-alt"></i>
                         <h4>Location:</h4>
                         <p>4G8P+W23, T. Curato Street, Cabadbaran</p>
                     </div>

                     <iframe
                         src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1392.7914238268247!2d125.5347042829396!3d9.117476004378542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1700530705016!5m2!1sen!2sph"
                         frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                 </div>

             </div>

             <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                 <form action="{{ route('home.store') }}" method="POST" role="form" class="email-form">
                    @csrf
                     <div class="form-group">
                         <label for="name">Your Name</label>
                         <input type="text" name="name" class="form-control" id="name">
                         @error('name')
                             <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                         @enderror
                     </div>
                     <div class="row">
                         <div class="form-group col-md-6">
                             <label for="name">Your Email</label>
                             <input type="email" name="email" class="form-control" id="email">
                             @error('email')
                                 <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="form-group col-md-6">
                             <label for="name">Your Phone #</label>
                             <input type="text" class="form-control" name="phone" id="phone">
                             @error('phone')
                                 <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                             @enderror
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="name">Purpose</label>
                         <select name="purpose" class="form-select">
                             <option value="" selected>Choose...</option>
                             <option value="lost">Report Lost</option>
                             <option value="found">Report Found</option>
                         </select>
                         @error('purpose')
                             <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <label for="name">Message</label>
                         <textarea class="form-control" name="message" rows="10"></textarea>
                         @error('message')
                             <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                         @enderror
                     </div>
                     @include('shared.success')
                     <div class="text-center"><button type="submit">Send Message</button></div>
                 </form>
             </div>

         </div>

     </div>
 </section><!-- End Contact Section -->
