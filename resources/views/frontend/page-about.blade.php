@extends('frontend.layout')

@section('content')
<section class="about-section">
    <div class="container">
        <div class="row">                
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="title">About help Needy</span>
                        <h2>Empowering Hope, Changing Lives: Together for a Better Tomorrow</h2>
                    </div>
                    <div class="text">"Help Needy" is a dedicated charity foundation committed to making a positive impact in communities worldwide. With a heartfelt mission, Help Needy strives to extend a helping hand to those in need, fostering a sense of compassion and unity. The foundation's name, "Needy," represents the spirit of kindness and support that drives their philanthropic endeavors. Help Needy believes in creating meaningful change by addressing critical issues such as education, healthcare, and poverty alleviation. Through collaborative efforts and generous donations, Help Needy aims to uplift underprivileged individuals and families, offering them a chance for a brighter future. By focusing on sustainable development projects, Help Needy ensures that its impact endures long after the initial assistance is provided.</div>
                  
                    <div class="btn-box">
                        <a href="#" class="theme-btn btn-style-one">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                  
                    <figure class="image-1"><a href="#" class="lightbox-image" data-fancybox="images"><img title="Rahul Kumar Yadav" src="{{ asset('uploads/pagesimg/poor-girl.jpg') }}" alt=""></a></figure>
                 
                </div>
            </div>
          
        </div>
       <div class="sec-title">
            <span class="title">Our Future Goal</span>
            <h2>We want to Help each and Every single Needy!</h2>
        </div>
      <div class="text">
        The primary goal of "Help Needy" is to create a profound and lasting positive impact on communities across the globe. Guided by an unwavering commitment to compassion and empathy, the foundation aims to extend support to individuals and families facing various challenges. Through its multifaceted initiatives, "Help Needy" seeks to address fundamental issues such as education, healthcare, and poverty alleviation.

        At the core of the foundation's mission lies a belief in the power of collective action. By fostering collaboration between volunteers, donors, and beneficiaries, "Help Needy" endeavors to build a network of support that transcends borders and backgrounds. The ultimate aspiration is to offer underprivileged individuals the tools and opportunities they need to forge a path towards a better future.
      </div>
           

    </div>
</section>
@endsection