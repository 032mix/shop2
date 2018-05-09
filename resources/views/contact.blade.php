@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="brand">
            <!-- Content --- Bar -->
            <div class="brand-content-bar">
                <ul class="path">
                    <li><a href="index.html">Home</a>&nbsp; ></li>
                    <li class="actev">Contact&nbsp;</li>
                </ul>
                <h3 class="page-hed">Give Us Your Feed Back Here</h3>
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d99362.47205895314!2d-77.01456655!3d38.8993487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7c6de5af6e45b%3A0xc2524522d4885d2a!2sWashington%2C+D.C.%2C+DC%2C+USA!5e0!3m2!1sen!2sin!4v1417093411482"
                            frameborder="0" style="border:0"></iframe>
                </div>
                <div class="clearfix"></div>
                <div class="contact-boxy">
                    <div class="text1">
                        <p>Name</p>
                        <input type="text">
                        <p>Email</p>
                        <input type="text">
                        <p>Subject</p>
                        <input type="text">
                    </div>
                    <div class="text1">
                        <p>Message</p>
                        <textarea></textarea>
                    </div>
                    <div class="text-b">
                        <input type="submit" value="Send"/>
                    </div>
                </div>
                <div class="address-box">
                    <h3>Our Address here</h3>
                    <p>Lorem Ipsy Contact Us here and here</p>
                    <p>Lorem Ipsy Contact Us here and here</p>
                    <p>Lorem Ipsy Contact Us here and here</p>
                    <p>+01 000 00 0000</p>
                    <p><a href="maito:example@email.com">example@ourcompany.com</a></p>
                </div>
            </div>
            <!-- Content --- Bar -->
            <!-- Side Bar-->
            <div class="brand-side-bar">
                <div class="top-brand">
                    <h3>Brand New Watch</h3>
                    <img src="images/top-brand.jpg" alt="">
                    <div class="discount">
                        <p>30% Descount</p>
                        <p>Today Offer</p>
                        <a href="single.html">Buy</a>
                    </div>
                </div>
                <div class="top-brand-menu">
                    <h3>All Brands We Serve</h3>
                    <ul class="brand-list">
                        <li><a href="#">Cloths Brands</a></li>
                        <li><a href="#">Watch Brands</a></li>
                        <li><a href="#">Shoes Brands</a></li>
                        <li><a href="#">Goggles Brands</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
                <div class="tags">
                    <h4 class="tag_head">Tags Widget</h4>
                    <ul class="tags_links">
                        <li><a href="#">Kitesurf</a></li>
                        <li><a href="#">Super</a></li>
                        <li><a href="#">Duper</a></li>
                        <li><a href="#">Theme</a></li>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Equipment</a></li>
                        <li><a href="#">Best</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Apparel</a></li>
                        <li><a href="#">Super</a></li>
                        <li><a href="#">Duper</a></li>
                        <li><a href="#">Theme</a></li>
                        <li><a href="#">Responsiv</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Equipment</a></li>
                    </ul>
                    <a href="#" class="link1">View all tags</a>
                </div>

            </div>
        </div>
    </div>

@endsection