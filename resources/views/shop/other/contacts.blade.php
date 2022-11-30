@extends('shop.components.layouts.main.main')

@section('content')

    <!-- ...::::Start Map Section:::... -->
    <div class="map-section" style="margin-top: 50px" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <!-- Start Contact Details -->
                    <div class="contact-details-wrapper" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-details">
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                                <div class="contact-details-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <a href="tel:+012345678102">+012 345 678 102</a>
                                    <a href="tel:+012345678102">+012 345 678 102</a>
                                </div>
                            </div> <!-- End Contact Details Single Item -->
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                                <div class="contact-details-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <a href="mailto:urname@email.com">urname@email.com</a>
                                    <a href="http://www.yourwebsite.com">www.yourwebsite.com</a>
                                </div>
                            </div> <!-- End Contact Details Single Item -->
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                                <div class="contact-details-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <span>Ми знаходимось,</span>
                                    <span>вулиця, Crossroad 123.</span>
                                </div>
                            </div> <!-- End Contact Details Single Item -->
                        </div>
                        <!-- Start Contact Social Link -->
                        <div class="contact-social">
                            <h5>Ми у соцмережах</h5>
                            <ul>
                                <li><a href="tg://resolve?domain=batura_m_v"><i class="fa fa-telegram"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- End Contact Social Link -->
                    </div> <!-- End Contact Details -->
                </div>

            </div>
        </div>
    </div> <!-- ...::::End  Map Section:::... -->

    <!-- ...::::Start Contact Section:::... -->
    <div class="contact-section" data-aos="fade-up" data-aos-delay="300">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form section-top-gap-100">
                        <h3>Зв'язок з нами | он вообще нужен?</h3>
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-name">Ваше ім'я</label>
                                        <input type="text" id="contact-name" placeholder="Як можна до Вас звертатися?" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-email">Email</label>
                                        <input type="email" id="contact-email" placeholder="Ваша електронна адреса" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-subject">Питання або він номер авто</label>
                                        <input placeholder="VIN номер автомобіля - якщо питання стосовно підбору запчастини" type="text" id="contact-subject">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-message">Ваше питання до нас</label>
                                        <textarea id="contact-message" cols="30" rows="10" placeholder="Ваше питання до нас, будемо раді допомогти Вам!"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="contact-submit-btn" type="submit">Надіслати</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4"></div>

            </div>
        </div>
    </div>
    <!-- ...::::ENd Contact Section:::... -->


@endsection
