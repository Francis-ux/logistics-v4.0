 <!-- footer -->
 <footer class="site-footer pbmit-bg-color-secondary">
     <div class="pbmit-footer-big-area-wrapper">
         <div class="pbmit-footer-big-area">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-md-12 col-xl-6 pbmit-footer-left">
                         <h3>Subscribe for latest <br> updates & insights</h3>
                     </div>
                     <div class="col-md-12 col-xl-6">
                         <form>
                             <div class="pbmit-footer-newsletter">
                                 <div class="pbmit-news-wrap">
                                     <input type="email" class="form-control" name="EMAIL"
                                         placeholder="Enter Your Email Address">
                                     <button class="pbmit-btn">
                                         <span class="pbmit-button-content-wrapper">
                                             <span class="pbmit-button-text">Subscribe Now</span>
                                         </span>
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <div class="pbmit-footer-widget-area">
             <div class="container">
                 <div class="row">
                     <div class="pbmit-footer-widget-col-1 col-md-4">
                         <aside class="widget">
                             <div class="pbmit-footer-logo">
                                 <img src="/frontend/images/footer-logo.svg" class="img-fluid" alt="">
                             </div><br>
                         </aside>
                     </div>
                     <div class="pbmit-footer-widget-col-2 col-md-4">
                         @if (config('contact.phone') && config('contact.email'))
                             <aside class="widget">
                                 <h2 class="widget-title">Say Hello</h2>
                                 <div class="pbmit-contact-widget-lines">
                                     <div class="pbmit-contact-widget-line pbmit-base-icon-phone">
                                         <a href="tel:+{{ config('contact.phone') }}"
                                             class="text-light">{{ config('contact.phone') }}</a>
                                     </div>
                                     <div class="pbmit-contact-widget-line pbmit-base-icon-email"><a
                                             href="mailto:{{ config('contact.email') }}"
                                             class="text-light">{{ config('contact.email') }}</a>
                                     </div>
                                 </div>
                             </aside>
                         @endif
                     </div>
                     <div class="pbmit-footer-widget-col-3 col-md-2">
                         <aside class="widget">
                             <h2 class="widget-title">Useful Link</h2>
                             <ul class="menu">
                                 <li><a href="{{ route('about') }}">About</a></li>
                                 <li><a href="{{ route('services') }}">Our Service</a></li>
                                 <li><a href="{{ route('contact.index') }}">Contact</a></li>
                                 <li><a href="{{ route('faq') }}">Faqs</a></li>
                                 <li><a href="{{ route('cargo.tracking.index') }}">Track</a></li>
                             </ul>
                         </aside>
                     </div>
                     <div class="pbmit-footer-widget-col-4 col-md-2">
                         <aside class="widget widget_text">
                             <h2 class="widget-title">Our Services</h2>
                             <ul class="menu">
                                 <li><a href="#">Logistics</a></li>
                                 <li><a href="#">Manufacturing</a></li>
                                 <li><a href="#">Production</a></li>
                                 <li><a href="#">Transportation</a></li>
                                 <li><a href="#">Warehouse</a></li>
                             </ul>
                         </aside>
                     </div>
                 </div>
             </div>
         </div>
         <div class="pbmit-footer-text-area">
             <div class="container">
                 <div class="pbmit-footer-text-inner">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="pbmit-footer-copyright-text-area">
                                 Copyright © 2025 <a href="/">{{ config('app.name') }}</a>, All Rights Reserved.
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- footer End -->
