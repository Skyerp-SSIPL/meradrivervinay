@extends('meradriver.app')
@section('title', 'About Oel')
@section('content')
   <!-- #header -->
   <!-- start banner Area -->
   <section class="banner-area relative" id="home">
      <video autoplay muted controls loop playsinline width="100%">
         <source src="{{asset('meradriver')}}/img/video.mp4" type="video/mp4">
      </video>
      <!-- <div class="overlay overlay-bg"></div> -->
      <div class="container">
         <div class="row  d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
               <h1 class="text-black">
                  Find your dream job
               </h1>
               <p class="mt-3">5 lakh+ jobs for you to explore</p>
               <form action="search.html" class="serach-form-area">
                  <div class="row justify-content-center form-wrap">
                     <div class="col-lg-4 form-cols">
                        <input type="text" class="form-control" name="search"
                           placeholder="Enter Skills/Desigation/Companies">
                     </div>
                     <div class="col-lg-3 form-cols">
                        <div class="default-select form-control" id="default-selects">
                           <select>
                              <option value="1">Select Experienced</option>
                              <option value="2">Fresher (Less then 1 Year)</option>
                              <option value="3">1 Year</option>
                              <option value="4">2 Year</option>
                              <option value="5">3 Year</option>
                              <option value="5">4 Year</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3 form-cols">
                        <div class="default-select" id="default-selects2">
                           <input type="text" class="form-control" name="location" placeholder="Enter Location">
                           
                        </div>
                     </div>
                     <div class="col-lg-2 form-cols">
                        <button type="button" class="btn btn-info">
                           <span class="lnr lnr-magnifier"></span> Search
                        </button>
                     </div>
                  </div>
               </form>
               
           
            </div>
         </div>
      </div>
   </section>
   <!-- End banner Area -->
   <!-- banner second Start -->
   <sction>
      <div class="banner-deatils mt-5">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-banner">
                     <img src="{{asset('meradriver')}}/img/pages/Group 1.png" alt="help">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </sction>

   <section>
      <div class="top-companies mt-5">
         <div class="container">
            <div id="mainSection.inventory-7" data-inventory-name="inventory-7" data-inventory-index="3">
               <div id="mainSection.inventory-7.naukri-homepage-industry-wdgt.v5"
                  class="naukri-wdgt naukri-homepage-industry-wdgt naukri-js-wdgt"
                  data-widget-name="naukri-homepage-industry-wdgt"
                  data-widget="{&quot;widgetName&quot;:&quot;naukri-homepage-industry-wdgt&quot;,&quot;version&quot;:&quot;v5&quot;,&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;widgetSequence&quot;:1,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryContext&quot;:{&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;inventoryType&quot;:0,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryName&quot;:&quot;inventory-7&quot;},&quot;tags&quot;:[&quot;t332&quot;]}">
                  <div id="naukri-homepage-industry-wdgt">
                     <div class="naukri-industry-wdgt">
                        <h2 class="headline">All Drivers hiring now</h2>
                        <div class="industry-group">
                           <div
                              class="swiper-container swiper-text industry-swiper-widget premium-swiper-wrap swiper-container-initialized swiper-container-horizontal">
                              <div class="premium-collection swiper-wrapper"
                                 style="transition-duration: 0ms; transform: translate3d(-996.491px, 0px, 0px);">
                                 <div class="swiper-slide tupple" style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card"
                                       link="https://www.meradriver.com/companies/cab-services?title=Top+Cab+Companies&amp;src=homepage_categories"
                                       index="1" name="Cab Services">
                                       <div class="chip-heading-div">
                                          <a class="industry-name"
                                             href="https://www.meradriver.com/companies/cab-services?title=Top+Cab+Companies&amp;src=homepage_categories">
                                             Cab Services
                                          </a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola8.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola9.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/loa10.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                         
                                       </div>
                                       <span class="industry-company">1.8K drivers needed now</span>
                                    </span>
                                 </div>

                                 <div class="swiper-slide tupple" style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card"
                                       link="https://www.meradriver.com/companies/logistics?title=Top+Logistics+Companies&amp;src=homepage_categories"
                                       index="2" name="Logistics">
                                       <div class="chip-heading-div">
                                          <a class="industry-name"
                                             href="https://www.meradriver.com/companies/logistics?title=Top+Logistics+Companies&amp;src=homepage_categories">
                                             Logistics
                                          </a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">2.3K+ drivers hiring</span>
                                       <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola4.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola2.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola8.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image">
                                            <img src="{{asset('meradriver')}}/img/pages/ola.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>

                                 <div class="swiper-slide tupple" style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card"
                                       link="https://www.meradriver.com/companies/commercial-transport?title=Commercial+Transport+Companies&amp;src=homepage_categories"
                                       index="3" name="Commercial Transport">
                                       <div class="chip-heading-div">
                                          <a class="industry-name"
                                             href="https://www.meradriver.com/companies/commercial-transport?title=Commercial+Transport+Companies&amp;src=homepage_categories">
                                             Commercial Transport
                                          </a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">500+ drivers required now</span>
                                       <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola4.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola7.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola8.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image">
                                            <img src="{{asset('meradriver')}}/img/pages/ola.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>

                                 <div class="swiper-slide tupple" style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card"
                                       link="https://www.meradriver.com/companies/hospitality-drivers?title=Hotel+%26+Shuttle+Drivers&amp;src=homepage_categories"
                                       index="4" name="Hospitality Drivers">
                                       <div class="chip-heading-div">
                                          <a class="industry-name"
                                             href="https://www.meradriver.com/companies/hospitality-drivers?title=Hotel+%26+Shuttle+Drivers&amp;src=homepage_categories">
                                             Hospitality Drivers
                                          </a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">150+ drivers hiring</span>
                                       <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola9.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola10.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola11.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image">
                                            <img src="{{asset('meradriver')}}/img/pages/ola1.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>

                                 <div class="swiper-slide tupple swiper-slide-active"
                                    style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card"
                                       link="https://www.meradriver.com/companies/fintech-payment-driver-jobs?title=Fintech+%26+Payment+Driver+Jobs&amp;src=homepage_categories"
                                       index="5" name="Fintech & Payment Drivers">
                                       <div class="chip-heading-div">
                                          <a class="industry-name"
                                             href="https://www.meradriver.com/companies/fintech-payment-driver-jobs?title=Fintech+%26+Payment+Driver+Jobs&amp;src=homepage_categories">
                                             Fintech & Payment Drivers
                                          </a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">50+ drivers required for delivery & finance
                                          roles</span>
                                          <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola3.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola2.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola1.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image">
                                            <img src="{{asset('meradriver')}}/img/pages/ola.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>

                                 <div class="swiper-slide tupple swiper-slide-next"
                                    style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card"
                                       link="https://www.meradriver.com/companies/fmcg-retail-driver-jobs?title=FMCG+%26+Retail+Driver+Jobs&amp;src=homepage_categories"
                                       index="6" name="FMCG & Retail Drivers">
                                       <div class="chip-heading-div">
                                          <a class="industry-name"
                                             href="https://www.meradriver.com/companies/fmcg-retail-driver-jobs?title=FMCG+%26+Retail+Driver+Jobs&amp;src=homepage_categories">
                                             FMCG & Retail Drivers
                                          </a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">200+ drivers hiring for retail & logistics</span>
                                       <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola4.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola7.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola9.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image">
                                            <img src="{{asset('meradriver')}}/img/pages/ola.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>

                                 <div class="swiper-slide tupple" style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card "
                                       link="https://www.naukri.com/startup-companies-in-india-cat103?title=Startups+actively+hiring&amp;src=discovery_orgExploreCompanies_homepage_srch"
                                       index="7" name="Startups">
                                       <div class="chip-heading-div"><a class="industry-name"
                                             href="https://www.naukri.com/startup-companies-in-india-cat103?title=Startups+actively+hiring&amp;src=discovery_orgExploreCompanies_homepage_srch">Startups</a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">624
                                          are actively hiring</span>
                                       <div class="industry_widget_logos">
                                          <div class="chip-image"><img
                                                src="https://img.naukimg.com/logo_images/groups/v1/5898424.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img
                                                src="https://img.naukimg.com/logo_images/groups/v1/10627402.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img
                                                src="https://img.naukimg.com/logo_images/groups/v1/11597440.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img
                                                src="https://img.naukimg.com/logo_images/groups/v1/4961339.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>
                                 <div class="swiper-slide tupple" style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card "
                                       link="https://www.naukri.com/startup-companies-in-india-cat103?title=Startups+actively+hiring&amp;src=discovery_orgExploreCompanies_homepage_srch"
                                       index="7" name="Startups">
                                       <div class="chip-heading-div"><a class="industry-name"
                                             href="https://www.naukri.com/startup-companies-in-india-cat103?title=Startups+actively+hiring&amp;src=discovery_orgExploreCompanies_homepage_srch">Startups</a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">624
                                          are actively hiring</span>
                                          <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola3.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola2.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola1.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image">
                                            <img src="{{asset('meradriver')}}/img/pages/ola.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>
                                  <div class="swiper-slide tupple" style="width: 233.123px; margin-right: 16px;">
                                    <span class="industry-card "
                                       link="https://www.naukri.com/startup-companies-in-india-cat103?title=Startups+actively+hiring&amp;src=discovery_orgExploreCompanies_homepage_srch"
                                       index="7" name="Startups">
                                       <div class="chip-heading-div"><a class="industry-name"
                                             href="https://www.naukri.com/startup-companies-in-india-cat103?title=Startups+actively+hiring&amp;src=discovery_orgExploreCompanies_homepage_srch">Startups</a>
                                          <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                             alt="arrow-icon">
                                       </div>
                                       <span class="industry-company">624
                                          are actively hiring</span>
                                       <div class="industry_widget_logos">
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola11.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola10.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image"><img src="{{asset('meradriver')}}/img/pages/ola9.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                          <div class="chip-image">
                                            <img src="{{asset('meradriver')}}/img/pages/ola.gif"
                                                class="companyLogo" alt="" height="" width=""></div>
                                       </div>
                                    </span>
                                 </div>

                              </div>
                              <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                 aria-disabled="false"></div>
                              <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                                 aria-disabled="false"></div>
                              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <span class="wdgt-track-view"
                     data-id="mainSection.inventory-7.naukri-homepage-industry-wdgt.v5"></span>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- top-companies -->
   <!-- features companies -->
   <section>
      <div class="features-companies-title mt-5">
         <div class="container">
            <div id="mainSection.branding-premium" data-inventory-name="branding-premium" data-inventory-index="4">
               <div id="mainSection.branding-premium.ni-desktop-homepage-v2_mainSection_branding-premium.v0"
                  class="naukri-wdgt ni-desktop-homepage-v2_mainSection_branding-premium naukri-js-wdgt"
                  data-widget-name="ni-desktop-homepage-v2_mainSection_branding-premium"
                  data-widget="{&quot;widgetName&quot;:&quot;ni-desktop-homepage-v2_mainSection_branding-premium&quot;,&quot;version&quot;:&quot;v0&quot;,&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;widgetSequence&quot;:1,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryContext&quot;:{&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;inventoryType&quot;:0,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryName&quot;:&quot;branding-premium&quot;},&quot;tags&quot;:[]}">
                  <div id="premium-collection-wdgt">
                     <div class="premium-collection-main">
                        <h2 class="premium-collection-title">Featured companies actively hiring</h2>

                        <div class="premium-swiper-wrap">
                           <div
                              class="swiper-container swiper-text swiper-premium-widget swiper-container-initialized swiper-container-horizontal">
                              <div class="premium-collection swiper-wrapper"
                                 style="transform: translate3d(0px, 0px, 0px);">
                                 <div class="swiper-slide swiper-slide-active"
                                    style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/amazon-overview-398058?src=premiumLogo"
                                       data-name="Amazon" data-val="0" tabindex="0" id="398058">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/service_1.png" alt="Amazon" class="logoImage">
                                       </div>
                                       <div class="contentwrap" style="background-color: rgba(244, 157, 44, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="">Full-time
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>

                                          </div>
                                       </div>

                                       <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-slide-next"
                                    style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/cognizant-overview-4156?src=premiumLogo"
                                       data-name="Cognizant" data-val="1" tabindex="0" id="4156">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/service_2.png" alt="Cognizant" class="logoImage">
                                       </div>
                                       <div class="contentwrap" style="background-color: rgba(11, 46, 134, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="">Part-time
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails"><span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                     
                                       <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/hitachi-energy-overview-5935206?src=premiumLogo"
                                       data-name="Hitachi Energy" data-val="2" tabindex="0" id="5935206">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_3.png" alt="Hitachi Energy"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(255, 0, 42, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/hitachi-energy-overview-5935206?src=premiumLogo">Contractual
                                                drivers
                                             </a>
                                          </h3>
                                          <div class="additionalDetails"><span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                           
                                          </div>
                                       </div>
                                      
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo"
                                       data-name="Expleo" data-val="3" tabindex="0" id="4666991">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_4.png" alt="Expleo"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(105, 70, 196, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo">Outstation
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                    
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo"
                                       data-name="Expleo" data-val="3" tabindex="0" id="4666991">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_4.png" alt="Expleo"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(105, 70, 196, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo">Outstation
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                    
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo"
                                       data-name="Expleo" data-val="3" tabindex="0" id="4666991">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_4.png" alt="Expleo"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(105, 70, 196, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo">Outstation
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                    
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo"
                                       data-name="Expleo" data-val="3" tabindex="0" id="4666991">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_4.png" alt="Expleo"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(105, 70, 196, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo">Outstation
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                    
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo"
                                       data-name="Expleo" data-val="3" tabindex="0" id="4666991">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_4.png" alt="Expleo"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(105, 70, 196, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo">Outstation
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                    
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo"
                                       data-name="Expleo" data-val="3" tabindex="0" id="4666991">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_4.png" alt="Expleo"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(105, 70, 196, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo">Outstation
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                    
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 233.333px; margin-right: 20px;">
                                    <div class="tuple premium "
                                       data-href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo"
                                       data-name="Expleo" data-val="3" tabindex="0" id="4666991">
                                       <div class="imagewrap"><img src="{{asset('meradriver')}}/img/pages/service_4.png" alt="Expleo"
                                             class="logoImage"></div>
                                       <div class="contentwrap" style="background-color: rgba(105, 70, 196, 0.03);">
                                          <h3 class="main-6 title" style="-webkit-line-clamp: 2;"><a class="compName "
                                                href="https://www.naukri.com/expleo-overview-4666991?src=premiumLogo">Outstation
                                                drivers</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/car_image.png" alt="rating" class="starImage">
                                             </span>
                                             
                                          </div>
                                       </div>
                                    
                                          <div class="mt-3">
                                             <li><label for="toggle-login" class="ticker-btn-login" id="cta" style="cursor: pointer;">Book Now</label></li>
                                          </div>
                                    </div>
                                 </div>
                                 
                         

                              </div>
                              <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                 aria-disabled="false"></div>
                              <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button"
                                 aria-label="Previous slide" aria-disabled="true"></div>
                              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                           </div>
                        </div>

                     </div>
                  </div>
                  <span class="wdgt-track-view"
                     data-id="mainSection.branding-premium.ni-desktop-homepage-v2_mainSection_branding-premium.v0"></span>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section>
      <div class="global-meradriver">
         <div class="container">
            <div id="mainSection.inventory-3" data-inventory-name="inventory-3" data-inventory-index="7">
               <div id="mainSection.inventory-3.role-collection-wdgt.v3"
                  class="meradriver-wdgt role-collection-wdgt meradriver-js-wdgt"
                  data-widget-name="role-collection-wdgt"
                  data-widget='{"widgetName":"role-collection-wdgt","version":"v3","sectionName":"mainSection","widgetSequence":1,"pageName":"md-desktop-homepage","inventoryContext":{"sectionName":"mainSection","inventoryType":0,"pageName":"md-desktop-homepage","inventoryName":"inventory-3"},"tags":["t331"]}'>
                  <div id="role-collection-wdgt">
                     <div class="role-collection-wdgt">
                        <div class="card-container">
                           <div class="left-section">
                              <img src="{{asset('meradriver')}}/img/pages/role-collection-ot.png" class="role-img"
                                 alt="meradriver role-collection" height="175" width="389">
                              <p class="heading">Explore Driving Roles Near You</p>
                              <p class="sub-heading">Choose a role and see job openings that match your experience!</p>
                           </div>
                           <div class="right-section">
                              <div
                                 class="swiper-container roleColSwiperWidget premium-swiper-wrap swiper-container-horizontal">
                                 <div class="premium-collection swiper-wrapper">

                                    <!-- Slide 1 -->
                                    <div class="swiper-slide tupple swiper-slide-active" index="1">
                                       <div class="chip-container">
                                          <div class="chip-case">
                                             <div class="chip">
                                                <div class="chip-text">
                                                   <a href="https://meradriver.com/jobs/truck-driver"
                                                      class="chip-heading">Truck Driver</a>
                                                   <p class="chip-count">1.2K+ Jobs  <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                                   alt="arrow-icon"></p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="chip-case">
                                             <div class="chip">
                                                <div class="chip-text">
                                                   <a href="https://meradriver.com/jobs/cab-driver"
                                                      class="chip-heading">Cab Driver</a>
                                                   <p class="chip-count">800+ Jobs  <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                                   alt="arrow-icon"></p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="chip-case">
                                             <div class="chip">
                                                <div class="chip-text">
                                                   <a href="https://meradriver.com/jobs/bus-driver"
                                                      class="chip-heading">Bus Driver</a>
                                                   <p class="chip-count">600+ Jobs  <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                                   alt="arrow-icon"></p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="chip-case">
                                             <div class="chip">
                                                <div class="chip-text">
                                                   <a href="https://meradriver.com/jobs/delivery-executive"
                                                      class="chip-heading">Delivery Executive</a>
                                                   <p class="chip-count">2.3K+ Jobs  <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                                   alt="arrow-icon"></p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="chip-case">
                                             <div class="chip">
                                                <div class="chip-text">
                                                   <a href="https://meradriver.com/jobs/heavy-vehicle-driver"
                                                      class="chip-heading">Heavy Vehicle Driver</a>
                                                   <p class="chip-count">1K+ Jobs  <img class="ntc__chip-arrow" src="{{asset('meradriver')}}/img/pages/arrow.2b55815e.svg"
                                                   alt="arrow-icon"></p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <!-- Additional slides can be added as needed -->

                                 </div>
                                 <!-- <div class="swiper-pagination swiper-pagination-bullets"></div> -->
                                 <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                    aria-disabled="false"></div>
                                 <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                                    aria-disabled="true"></div>
                                 <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <span class="wdgt-track-view" data-id="mainSection.inventory-3.role-collection-wdgt.v3"></span>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- popular jobs -->
   <!-- Sponsored companies -->
   <section>
      <div class="sponsored-title">
         <div class="container">
            <div id="mainSection.branding-standard" data-inventory-name="branding-standard" data-inventory-index="8">
               <div id="mainSection.branding-standard.ni-desktop-homepage-v2_mainSection_branding-standard.v0"
                  class="naukri-wdgt ni-desktop-homepage-v2_mainSection_branding-standard naukri-js-wdgt"
                  data-widget-name="ni-desktop-homepage-v2_mainSection_branding-standard"
                  data-widget="{&quot;widgetName&quot;:&quot;ni-desktop-homepage-v2_mainSection_branding-standard&quot;,&quot;version&quot;:&quot;v0&quot;,&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;widgetSequence&quot;:1,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryContext&quot;:{&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;inventoryType&quot;:0,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryName&quot;:&quot;branding-standard&quot;},&quot;tags&quot;:[]}">
                  <div id="standard-collection-wdgt">
                     <div class="standard-collection-main">
                        <h2 class="standard-collection-title">Sponsored companies</h2>

                        <div class="standard-swiper-wrap">
                           <div
                              class="swiper-container swiper-text swiper-standard-widget swiper-container-initialized swiper-container-horizontal">
                              <div class="standard-collection swiper-wrapper"
                                 style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                 <div class="swiper-slide swiper-slide-active"
                                    style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard"
                                       data-href="https://www.naukri.com/meradriver-overview-9999999?src=standardLogo"
                                       data-name="MeraDriver" data-val="0" tabindex="0" id="9999999">
                                       <div class="imagewrap">
                                            <img src="{{asset('meradriver')}}/img/pages/logo97.gif"
                                             class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.naukri.com/meradriver-overview-9999999?src=standardLogo">MeraDriver</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating" class="starImage">
                                             </span>
                                             <span class="main-2 rating">4.5</span>
                                             <span class="main-2 reviews">1.2K+ reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Logistics</span>
                                             <span class="cardtag">Driver Network</span>
                                             <span class="cardtag">Fleet Management</span>
                                             <span class="cardtag">Tech Platform</span>
                                             <span class="cardtag">Startup</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tuple standard row-2"
                                       data-href="https://www.naukri.com/meradriver-fleet-overview-9999998?src=standardLogo"
                                       data-name="MeraDriver Fleet Services" data-val="1" tabindex="0" id="9999998">
                                       <div class="imagewrap">
                                           <img src="{{asset('meradriver')}}/img/pages/logo32.gif"
                                             alt="MeraDriver Fleet Services" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.naukri.com/meradriver-fleet-overview-9999998?src=standardLogo">MeraDriver
                                                Fleet Services</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="img/pages/star.svg" alt="rating" class="starImage">
                                             </span>
                                             <span class="main-2 rating">4.2</span>
                                             <span class="main-2 reviews">800+ reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Logistics</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Driver Hiring</span>
                                             <span class="cardtag">Operations</span>
                                             <span class="cardtag">Transport Tech</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard"
                                       data-href="https://www.meradriver.com/company/meradriver-tech"
                                       data-name="MeraDriver Technologies" data-val="1" tabindex="0" id="mdtech1">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo97.gif"
                                             class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/meradriver-tech">MeraDriver
                                                Technologies</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating" class="starImage">
                                             </span>
                                             <span class="main-2 rating">4.5</span>
                                             <span class="main-2 reviews">980 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Mobility</span>
                                             <span class="cardtag">Driver App</span>
                                             <span class="cardtag">B2C</span>
                                             <span class="cardtag">Transport Tech</span>
                                             <span class="cardtag">Startup</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/roadrunners"
                                       data-name="RoadRunners Inc." data-val="2" tabindex="0" id="rrinc2">
                                       <div class="imagewrap">
                                           <img src="{{asset('meradriver')}}/img/pages/logo88.gif"
                                             alt="RoadRunners Inc." class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/roadrunners">RoadRunners
                                                Inc.</a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star">
                                                <img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating" class="starImage">
                                             </span>
                                             <span class="main-2 rating">4.2</span>
                                             <span class="main-2 reviews">760 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Fleet</span>
                                             <span class="cardtag">Driver Services</span>
                                             <span class="cardtag">Last Mile</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Logistics</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard"
                                       data-href="https://www.meradriver.com/company/meradriver-solutions"
                                       data-name="MeraDriver Solutions" data-val="8" tabindex="0" id="md-008">
                                       <div class="imagewrap">
                                            <img src="{{asset('meradriver')}}/img/pages/logo78.gif"
                                             alt="MeraDriver" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/meradriver-solutions">
                                                MeraDriver Solutions
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.6</span>
                                             <span class="main-2 reviews">1.2K+ reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Mobility</span>
                                             <span class="cardtag">Driver Network</span>
                                             <span class="cardtag">Fleet Tech</span>
                                             <span class="cardtag">B2C</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/rapidgo" data-name="RapidGo Fleet"
                                       data-val="9" tabindex="0" id="md-009">
                                       <div class="imagewrap">
                                        <img src="{{asset('meradriver')}}/img/pages/logo68.gif"
                                             alt="RapidGo" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/rapidgo">
                                                RapidGo Fleet
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.3</span>
                                             <span class="main-2 reviews">620 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Last-Mile Delivery</span>
                                             <span class="cardtag">Logistics</span>
                                             <span class="cardtag">Driver Support</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard" data-href="https://www.meradriver.com/company/autoshift"
                                       data-name="AutoShift Mobility" data-val="10" tabindex="0" id="md-010">
                                       <div class="imagewrap">
                                           <img src="{{asset('meradriver')}}/img/pages/logo90.gif"
                                             alt="AutoShift Mobility" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/autoshift">
                                                AutoShift Mobility
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.0</span>
                                             <span class="main-2 reviews">890 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Transport</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Private</span>
                                             <span class="cardtag">Fleet Operations</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/driversecure"
                                       data-name="DriverSecure" data-val="11" tabindex="0" id="md-011">
                                       <div class="imagewrap">
                                            <img src="{{asset('meradriver')}}/img/pages/logo91.gif"
                                             alt="DriverSecure" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/driversecure">
                                                DriverSecure
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">3.9</span>
                                             <span class="main-2 reviews">430 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Driver Safety</span>
                                             <span class="cardtag">Corporate</span>
                                             <span class="cardtag">Tech-Enabled</span>
                                             <span class="cardtag">Security</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard" data-href="https://www.meradriver.com/company/autoshift"
                                       data-name="AutoShift Mobility" data-val="10" tabindex="0" id="md-010">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo97.gif"
                                             alt="AutoShift Mobility" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/autoshift">
                                                AutoShift Mobility
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.0</span>
                                             <span class="main-2 reviews">890 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Transport</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Private</span>
                                             <span class="cardtag">Fleet Operations</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/driversecure"
                                       data-name="DriverSecure" data-val="11" tabindex="0" id="md-011">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo69.gif"
                                             alt="DriverSecure" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/driversecure">
                                                DriverSecure
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">3.9</span>
                                             <span class="main-2 reviews">430 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Driver Safety</span>
                                             <span class="cardtag">Corporate</span>
                                             <span class="cardtag">Tech-Enabled</span>
                                             <span class="cardtag">Security</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard" data-href="https://www.meradriver.com/company/autoshift"
                                       data-name="AutoShift Mobility" data-val="10" tabindex="0" id="md-010">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo91.gif"
                                             alt="AutoShift Mobility" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/autoshift">
                                                AutoShift Mobility
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.0</span>
                                             <span class="main-2 reviews">890 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Transport</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Private</span>
                                             <span class="cardtag">Fleet Operations</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/driversecure"
                                       data-name="DriverSecure" data-val="11" tabindex="0" id="md-011">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo90.gif"
                                             alt="DriverSecure" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/driversecure">
                                                DriverSecure
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">3.9</span>
                                             <span class="main-2 reviews">430 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Driver Safety</span>
                                             <span class="cardtag">Corporate</span>
                                             <span class="cardtag">Tech-Enabled</span>
                                             <span class="cardtag">Security</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard" data-href="https://www.meradriver.com/company/autoshift"
                                       data-name="AutoShift Mobility" data-val="10" tabindex="0" id="md-010">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo88.gif"
                                             alt="AutoShift Mobility" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/autoshift">
                                                AutoShift Mobility
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.0</span>
                                             <span class="main-2 reviews">890 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Transport</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Private</span>
                                             <span class="cardtag">Fleet Operations</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/driversecure"
                                       data-name="DriverSecure" data-val="11" tabindex="0" id="md-011">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo78.gif"
                                             alt="DriverSecure" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/driversecure">
                                                DriverSecure
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">3.9</span>
                                             <span class="main-2 reviews">430 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Driver Safety</span>
                                             <span class="cardtag">Corporate</span>
                                             <span class="cardtag">Tech-Enabled</span>
                                             <span class="cardtag">Security</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard" data-href="https://www.meradriver.com/company/autoshift"
                                       data-name="AutoShift Mobility" data-val="10" tabindex="0" id="md-010">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo68.gif"
                                             alt="AutoShift Mobility" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/autoshift">
                                                AutoShift Mobility
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.0</span>
                                             <span class="main-2 reviews">890 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Transport</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Private</span>
                                             <span class="cardtag">Fleet Operations</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/driversecure"
                                       data-name="DriverSecure" data-val="11" tabindex="0" id="md-011">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo66.gif"
                                             alt="DriverSecure" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/driversecure">
                                                DriverSecure
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">3.9</span>
                                             <span class="main-2 reviews">430 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Driver Safety</span>
                                             <span class="cardtag">Corporate</span>
                                             <span class="cardtag">Tech-Enabled</span>
                                             <span class="cardtag">Security</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard" data-href="https://www.meradriver.com/company/autoshift"
                                       data-name="AutoShift Mobility" data-val="10" tabindex="0" id="md-010">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo57.gif"
                                             alt="AutoShift Mobility" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/autoshift">
                                                AutoShift Mobility
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.0</span>
                                             <span class="main-2 reviews">890 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Transport</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Private</span>
                                             <span class="cardtag">Fleet Operations</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/driversecure"
                                       data-name="DriverSecure" data-val="11" tabindex="0" id="md-011">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}img/pages/logo46.gif"
                                             alt="DriverSecure" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/driversecure">
                                                DriverSecure
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">3.9</span>
                                             <span class="main-2 reviews">430 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Driver Safety</span>
                                             <span class="cardtag">Corporate</span>
                                             <span class="cardtag">Tech-Enabled</span>
                                             <span class="cardtag">Security</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide" style="width: 265px; margin-right: 20px;">
                                    <div class="tuple standard" data-href="https://www.meradriver.com/company/autoshift"
                                       data-name="AutoShift Mobility" data-val="10" tabindex="0" id="md-010">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo45.gif"
                                             alt="AutoShift Mobility" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/autoshift">
                                                AutoShift Mobility
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">4.0</span>
                                             <span class="main-2 reviews">890 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Transport</span>
                                             <span class="cardtag">B2B</span>
                                             <span class="cardtag">Private</span>
                                             <span class="cardtag">Fleet Operations</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tuple standard row-2"
                                       data-href="https://www.meradriver.com/company/driversecure"
                                       data-name="DriverSecure" data-val="11" tabindex="0" id="md-011">
                                       <div class="imagewrap">
                                          <img src="{{asset('meradriver')}}/img/pages/logo32.gif"
                                             alt="DriverSecure" class="logoImage">
                                       </div>
                                       <div class="contentwrap">
                                          <h3 class="main-4 title" style="-webkit-line-clamp: 1;">
                                             <a class="compName ellipsis right-arrow"
                                                href="https://www.meradriver.com/company/driversecure">
                                                DriverSecure
                                             </a>
                                          </h3>
                                          <div class="additionalDetails">
                                             <span class="star"><img src="{{asset('meradriver')}}/img/pages/star.svg" alt="rating"
                                                   class="starImage"></span>
                                             <span class="main-2 rating">3.9</span>
                                             <span class="main-2 reviews">430 reviews</span>
                                          </div>
                                          <div class="tagswrap">
                                             <span class="cardtag">Driver Safety</span>
                                             <span class="cardtag">Corporate</span>
                                             <span class="cardtag">Tech-Enabled</span>
                                             <span class="cardtag">Security</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>


                              </div>
                              <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                 aria-disabled="false"></div>
                              <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button"
                                 aria-label="Previous slide" aria-disabled="true"></div>
                              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                           </div>
                        </div>

                     </div>
                  </div>
                  <span class="wdgt-track-view"
                     data-id="mainSection.branding-standard.ni-desktop-homepage-v2_mainSection_branding-standard.v0"></span>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Sponsored companies -->
   <!-- upcoming slider -->
   <section>
      <div class="upcomig-slider">
         <div class="container">
            <div id="mainSection.homepageEventsWdgt" data-inventory-name="homepageEventsWdgt" data-inventory-index="9">
               <div id="mainSection.homepageEventsWdgt.ni-desktop-homepage-v2_mainSection_homepageEventsWdgt_event.v0"
                  class="naukri-wdgt ni-desktop-homepage-v2_mainSection_homepageEventsWdgt_event naukri-js-wdgt"
                  data-widget-name="ni-desktop-homepage-v2_mainSection_homepageEventsWdgt_event"
                  data-widget="{&quot;widgetName&quot;:&quot;ni-desktop-homepage-v2_mainSection_homepageEventsWdgt_event&quot;,&quot;version&quot;:&quot;v0&quot;,&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;widgetSequence&quot;:1,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryContext&quot;:{&quot;sectionName&quot;:&quot;mainSection&quot;,&quot;inventoryType&quot;:0,&quot;pageName&quot;:&quot;ni-desktop-homepage-v2&quot;,&quot;inventoryName&quot;:&quot;homepageEventsWdgt&quot;},&quot;tags&quot;:[]}">
                  <div id="naukri-events-homepage-wdgt">
                     <div class="naukri-swiper-wdgt naukri-events-swiper">
                        <div class="logo-container">
                           <h4 class="heading">Happy Drivers</h4>
                           <img src="{{asset('meradriver')}}/img/pages/Isolation_Mode.png" class="logo"
                              alt="swiper placeholder" height="181" width="180">
                        </div>
                        <div class="swiper-box" style="width: 700px;">
                           <div
                              class="swiper-container swiper-upcoming events-swiper premium-swiper-wrap swiper-container-initialized swiper-container-horizontal">
                              <div class="premium-collection swiper-wrapper"
                                 style="transform: translate3d(-1627.67px, 0px, 0px); transition-duration: 0ms;">
                                 <div class="swiper-slide tupple" style="width: 322.667px; margin-right: 20px;">
                                    <div class="feature-card-container desktop-homepage-events-wdgt">
                                       <div class="feature-card-header-image-container">
                                          <div class="feature-card-image-container">
                                             <img src="{{asset('meradriver')}}/img/pages/man-car-driving.jpg"
                                                class="feature-card-image" alt="feature-card" height="" width="">
                                             <div class="feature-card-image-overlay"></div>
                                             <div class="feature-card-date-rewards-container">
                                                <!-- <div class="feature-card-date-label">Entry closes by 29
                                                   Apr
                                                </div> -->
                                                <div class="ribbon-2">
                                                   <p class="rewards-label">Hiring</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="feature-card-details-container">
                                          <div class="organizer-container">
                                             <div class="organizer-logo-container">
                                              
                                                </div>
                                             <div class="organizer-description-container">
                                                <p class="feature-card-heading">Jonhy clean
                                                </p>
                                                <p class="feature-card-organizer">
                                                   <span class="feature-card-organizer-label">Ease-My-Trip</span>
                                                </p>
                                             </div>
                                          </div>
                                         
                                          <div class="feature-card-stats-container">
                                             <div class="feature-card-date-container">
                                                <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                   class="naukicon-calendar" alt="User icon" height="" width="">
                                                <p class="feature-card-date-label">Your service was really awesome.
                                                   I’m so happy with that.</p>
                                             </div>
                                           
                                          </div>
                                       </div>
                                       <div class="feature-card-footer">
                                          <div class="footer-separator"></div>
                                          <div class="semi-cricle-container">
                                             <div class="left semi-circle"></div>
                                             <div class="right semi-circle"></div>
                                          </div>
                                          <div class="feature-card-footer-container">
                                             <div class="feature-card-type-tag-container">
                                               
                                                   <p class="feature-card-type-label">
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                   </p>
                                             </div>
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide tupple" style="width: 322.667px; margin-right: 20px;">
                                    <div class="feature-card-container desktop-homepage-events-wdgt">
                                       <div class="feature-card-header-image-container">
                                          <div class="feature-card-image-container">
                                          
                                          <img src="{{asset('meradriver')}}/img/pages/driver2.jpg"
                                                class="feature-card-image" alt="feature-card" height="" width="">
                                             <div class="feature-card-image-overlay"></div>
                                             <div class="feature-card-date-rewards-container">

                                                <div class="ribbon-2">
                                                   <p class="rewards-label">Hiring</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="feature-card-details-container">
                                          <div class="organizer-container">
                                             <div class="organizer-logo-container">
                                              
                                                </div>
                                             <div class="organizer-description-container">
                                                <p class="feature-card-heading">Clustter ronaldo
                                                </p>
                                                <p class="feature-card-organizer">Steller industries
                                                </p>
                                             </div>
                                          </div>
                                       
                                          <div class="feature-card-stats-container">
                                             <div class="feature-card-date-container">
                                                <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                   class="naukicon-calendar" alt="User icon" height="" width="">
                                                <p class="feature-card-date-label">Your service was really awesome.
                                                   I’m so happy with that.</p>
                                             </div>
                                             <!-- <div class="registered-user-container">
                                                <img src="https://static.naukimg.com/s/0/0/i/Events/icons/user-ot.svg"
                                                   class="naukicon-user" alt="User icon" height="" width="">
                                                <p class="registered-count-label">899 Enrolled</p>
                                             </div> -->
                                          </div>
                                       </div>
                                       <div class="feature-card-footer">
                                          <div class="footer-separator"></div>
                                          <div class="semi-cricle-container">
                                             <div class="left semi-circle"></div>
                                             <div class="right semi-circle"></div>
                                          </div>
                                          <div class="feature-card-footer-container">
                                             <div class="feature-card-type-tag-container">
                                                <!-- <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/ot-briefcase.svg"
                                                   class="feature-card-type-icon" alt="feature-card-type-icon" height=""
                                                   width="" iserrored="true"> -->
                                                   <p class="feature-card-type-label">
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                   </p>
                                             </div>
                                             <!-- <div class="cta-container"><a class="cta-link"
                                                   href="">View
                                                   details</a>
                                             </div> -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide tupple" style="width: 322.667px; margin-right: 20px;">
                                    <div class="feature-card-container desktop-homepage-events-wdgt">
                                       <div class="feature-card-header-image-container">
                                          <div class="feature-card-image-container">
                                             <img src="{{asset('meradriver')}}/img/pages/driver3.jpg"
                                                class="feature-card-image" alt="feature-card" height="" width="">
                                             <div class="feature-card-image-overlay"></div>
                                             <div class="feature-card-date-rewards-container">
                                                <!-- <div class="feature-card-date-label">Entry closes in 4d
                                                </div> -->
                                                <div class="ribbon-2">
                                                   <p class="rewards-label">Hiring</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="feature-card-details-container">
                                          <div class="organizer-container">
                                             <div class="organizer-logo-container">
                                                <!-- <img
                                                   src="https://img.naukimg.com/logo_images/groups/v1/162228.gif"
                                                   class="logo-img" alt="company logo" height="" width=""> -->
                                                </div>
                                             <div class="organizer-description-container">
                                                <p class="feature-card-heading">Nathan Alohe
                                                </p>
                                                <p class="feature-card-organizer">Aws Cloud</p>
                                             </div>
                                          </div>
                                        
                                          <div class="feature-card-stats-container">
                                             <div class="feature-card-date-container">
                                                <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                   class="naukicon-calendar" alt="User icon" height="" width="">
                                                <p class="feature-card-date-label">Your service was really awesome.
                                                   I’m so happy with that.</p>
                                             </div>
                                           
                                          </div>
                                       </div>
                                       <div class="feature-card-footer">
                                          <div class="footer-separator"></div>
                                          <div class="semi-cricle-container">
                                             <div class="left semi-circle"></div>
                                             <div class="right semi-circle"></div>
                                          </div>
                                          <div class="feature-card-footer-container">
                                             <div class="feature-card-type-tag-container">

<p class="feature-card-type-label">
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                   </p>
                                             </div>
                                             <!-- <div class="cta-container"><a class="cta-link"
                                                   href="">View
                                                   details</a>
                                             </div> -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide tupple swiper-slide-prev"
                                    style="width: 322.667px; margin-right: 20px;">
                                    <div class="feature-card-container desktop-homepage-events-wdgt">
                                       <div class="feature-card-header-image-container">
                                          <div class="feature-card-image-container">
                                             <img src="{{asset('meradriver')}}/img/pages/driver4.jpg"
                                                class="feature-card-image" alt="feature-card" height="" width=""
                                                iserrored="true">
                                             <div class="feature-card-image-overlay"></div>
                                             <div class="feature-card-date-rewards-container">
                                                <!-- <div class="feature-card-date-label">Entry closes in 1d
                                                </div> -->
                                                <div class="ribbon-2">
                                                   <p class="rewards-label">Hiring</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="feature-card-details-container">
                                          <div class="organizer-container">
                                             <div class="organizer-logo-container">
                                                <!-- <img
                                                   src="https://img.naukimg.com/logo_images/groups/v1/4670525.gif"
                                                   class="logo-img" alt="company logo" height="" width=""> -->
                                                </div>
                                             <div class="organizer-description-container">
                                                <p class="feature-card-heading">Harris Peri
                                                </p>
                                                <p class="feature-card-organizer">Wipro</p>
                                             </div>
                                          </div>
                                         
                                          <div class="feature-card-stats-container">
                                             <div class="feature-card-date-container">
                                                <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                   class="naukicon-calendar" alt="User icon" height="" width="">
                                                <p class="feature-card-date-label">Your service was really awesome.
                                                   I’m so happy with that.</p>
                                             </div>
                                             <!-- <div class="registered-user-container">
                                                <img src="https://static.naukimg.com/s/0/0/i/Events/icons/user-ot.svg"
                                                   class="naukicon-user" alt="User icon" height="" width="">
                                                <p class="registered-count-label">467 Enrolled</p>
                                             </div> -->
                                          </div>
                                       </div>
                                       <div class="feature-card-footer">
                                          <div class="footer-separator"></div>
                                          <div class="semi-cricle-container">
                                             <div class="left semi-circle"></div>
                                             <div class="right semi-circle"></div>
                                          </div>
                                          <div class="feature-card-footer-container">
                                             <div class="feature-card-type-tag-container">
                                                <!-- <img src="https://static.naukimg.com/s/0/0/i/Events/icons/bulb.svg"
                                                   class="feature-card-type-icon" alt="feature-card-type-icon" height=""
                                                   width="" iserrored="true"> -->
                                                   <p class="feature-card-type-label">
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                   </p>
                                             </div>

</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide tupple swiper-slide-active"
                                    style="width: 322.667px; margin-right: 20px;">
                                    <div class="feature-card-container desktop-homepage-events-wdgt">
                                       <div class="feature-card-header-image-container">
                                          <div class="feature-card-image-container">
                                             <img src="{{asset('meradriver')}}/img/pages/driver5.jpg"
                                                class="feature-card-image" alt="feature-card" height="" width=""
                                                iserrored="true">
                                             <div class="feature-card-image-overlay"></div>
                                             <div class="feature-card-date-rewards-container">
                                                <div class="feature-card-date-label">
                                                   <!-- <div class="orange-txt">Entry closes in 6h</div> -->
                                                </div>
                                                <div class="ribbon-2">
                                                   <p class="rewards-label">Hiring</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="feature-card-details-container">
                                          <div class="organizer-container">
                                             <div class="organizer-logo-container">
                                                <!-- <img
                                                   src="https://img.naukimg.com/logo_images/groups/v1/4670525.gif"
                                                   class="logo-img" alt="company logo" height="" width=""> -->
                                                </div>
                                             <div class="organizer-description-container">
                                                <p class="feature-card-heading">Rpzero Nextle
                                                <p class="feature-card-organizer">Amazon </p>
                                             </div>
                                          </div>
                                         
                                          <div class="feature-card-stats-container">
                                             <div class="feature-card-date-container">
                                                <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                   class="naukicon-calendar" alt="User icon" height="" width="">
                                                <p class="feature-card-date-label">Your service was really awesome.
                                                   I’m so happy with that.</p>
                                             </div>
                                             <!-- <div class="registered-user-container">
                                                <img src="https://static.naukimg.com/s/0/0/i/Events/icons/user-ot.svg"
                                                   class="naukicon-user" alt="User icon" height="" width="">
                                                <p class="registered-count-label">1.7K Enrolled</p>
                                             </div> -->
                                          </div>
                                       </div>
                                       <div class="feature-card-footer">
                                          <div class="footer-separator"></div>
                                          <div class="semi-cricle-container">
                                             <div class="left semi-circle"></div>
                                             <div class="right semi-circle"></div>
                                          </div>
                                          <div class="feature-card-footer-container">
                                             <div class="feature-card-type-tag-container">
                                             
                                                   <p class="feature-card-type-label">
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                   </p>
                                             </div>
                                             
                                          </div>

                                      </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide tupple swiper-slide-next"
                                    style="width: 322.667px; margin-right: 20px;">
                                    <div class="feature-card-container desktop-homepage-events-wdgt">
                                       <div class="feature-card-header-image-container">
                                          <div class="feature-card-image-container">
                                             <img src="{{asset('meradriver')}}/img/pages/man-car-driving (1).jpg"
                                                class="feature-card-image" alt="feature-card" height="" width=""
                                                iserrored="true">
                                             <div class="feature-card-image-overlay"></div>
                                             <div class="feature-card-date-rewards-container">
                                                <!-- <div class="feature-card-date-label">Entry closes in 3d
                                                </div> -->
                                                <div class="ribbon-2">
                                                   <p class="rewards-label">Hiring</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="feature-card-details-container">
                                          <div class="organizer-container">
                                             <div class="organizer-logo-container">
                                                <!-- <img
                                                   src="https://img.naukimg.com/logo_images/groups/v1/4670525.gif"
                                                   class="logo-img" alt="company logo" height="" width=""> -->
                                                </div>
                                             <div class="organizer-description-container">
                                                <p class="feature-card-heading">Crack Big
                                                </p>
                                                <p class="feature-card-organizer">Vertex</p>
                                             </div>
                                          </div>
                                         
                                          <div class="feature-card-stats-container">
                                             <div class="feature-card-date-container">
                                                <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                   class="naukicon-calendar" alt="User icon" height="" width="">
                                                <p class="feature-card-date-label">Your service was really awesome.
                                                   I’m so happy with that.</p>
                                             </div>
                                             <!-- <div class="registered-user-container">
                                                <img src="https://static.naukimg.com/s/0/0/i/Events/icons/user-ot.svg"
                                                   class="naukicon-user" alt="User icon" height="" width="">
                                                <p class="registered-count-label">57 Enrolled</p>
                                             </div> -->
                                          </div>
                                       </div>
                                       <div class="feature-card-footer">
                                          <div class="footer-separator"></div>
                                          <div class="semi-cricle-container">
                                             <div class="left semi-circle"></div>
                                             <div class="right semi-circle"></div>
                                          </div>
                                          <div class="feature-card-footer-container">
                                             <div class="feature-card-type-tag-container">
                                              
                                                   <p class="feature-card-type-label">
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                   </p>
                                             </div>
                                           
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide tupple" style="width: 322.667px; margin-right: 20px;">
                                    <div class="feature-card-container desktop-homepage-events-wdgt">
                                       <div class="feature-card-header-image-container">
                                          <div class="feature-card-image-container">
                                               <img src="{{asset('meradriver')}}/img/pages/driver6.jpg"
                                                class="feature-card-image" alt="feature-card" height="" width=""
                                                iserrored="true">
                                             <div class="feature-card-image-overlay"></div>
                                             <div class="feature-card-date-rewards-container">

                                                 <div class="ribbon-2">
                                                   <p class="rewards-label">Hiring</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="feature-card-details-container">
                                          <div class="organizer-container">
                                             <div class="organizer-logo-container">
                                                
                                                </div>
                                             <div class="organizer-description-container">
                                                <p class="feature-card-heading">Nicolas Harlya
                                                </p>
                                                <p class="feature-card-organizer">Nestle </p>
                                             </div>
                                          </div>
                                         
                                          <div class="feature-card-stats-container">
                                             <div class="feature-card-date-container">
                                                <img
                                                   src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                   class="naukicon-calendar" alt="User icon" height="" width="">
                                                <p class="feature-card-date-label">Your service was really awesome.
                                                   I’m so happy with that.</p>
                                             </div>
                                           
                                          </div>
                                       </div>
                                       <div class="feature-card-footer">
                                          <div class="footer-separator"></div>
                                          <div class="semi-cricle-container">
                                             <div class="left semi-circle"></div>
                                             <div class="right semi-circle"></div>
                                          </div>
                                          <div class="feature-card-footer-container">
                                             <div class="feature-card-type-tag-container">
                                              
                                                   <p class="feature-card-type-label">
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                   </p>
                                             </div>
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button"
                                 aria-label="Next slide" aria-disabled="true"></div>
                              <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                                 aria-disabled="false"></div>
                              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <span class="wdgt-track-view"
                     data-id="mainSection.homepageEventsWdgt.ni-desktop-homepage-v2_mainSection_homepageEventsWdgt_event.v0"></span>
               </div>
            </div>
         </div>
      </div>
   </section>














   <section>
      <div class="min-sms-recieved">
         <div class="container">
            <div id="mainSection.inventory-8" data-inventory-name="inventory-8" data-inventory-index="13">
               <div class="main-download-link-app-wdgt meradriver-wdgt download-app-link-json-wdgt"
                  id="mainSection.inventory-8.download-app-link-json-wdgt.v5"
                  data-widget-name="download-app-link-json-wdgt"
                  data-widget='{"widgetName":"download-app-link-json-wdgt","version":"v5","sectionName":"mainSection","widgetSequence":2,"pageName":"meradriver-homepage","inventoryContext":{"sectionName":"mainSection","inventoryType":0,"pageName":"meradriver-homepage","inventoryName":"inventory-8"},"tags":["t132"]}'>

                  <div class="main-download-heading-container">
                     <div class="wdgt-app-header" style="width:350px">
                        <h3 class="wdgt-title">1M+ drivers trust the MeraDriver app</h3>
                        <p class="wdgt-desc">Get job alerts, trip updates, and more – right on your phone!</p>
                     </div>

                     <form class="wdgt-form-download-app">
                        <span class="wdgt-input-wrapper">
                           <input class="wdgt-input" type="text" placeholder="Enter mobile number..." maxlength="10"
                              name="userMbNum" autocomplete="off">
                        </span>
                        <input type="submit" class="wdgt-form-btn" title="Get link" value="Get App Link">
                     </form>

                     <p class="wdgt-form-max-lmt">You've reached the daily SMS limit</p>
                     <p class="wdgt-form-action-status"> Error </p>

                     <div class="download-wdgt-success-msg-container"></div>

                     <div class="download-wdgt-footer">
                        <div class="wdgt-download-app-link">
                           <a class="wdgt-app-icon"
                              href="https://play.google.com/store/apps/details?id=com.meradriver.app"
                              title="Get it on Google Play" target="_blank">
                              <img src="img/pages/car_image.png" height="32" width="109"
                                 alt="Google Play">
                           </a>
                           <a class="wdgt-app-icon" href="https://apps.apple.com/in/app/meradriver/id1234567890"
                              title="Download on App Store" target="_blank">
                              <img src="https://meradriver.com/public/frontend/assets/common-image/app-mer-driver.png" height="32" width="109"
                                 alt="App Store">
                           </a>
                        </div>
                     </div>
                  </div>

                  <div class="barcode-image" style="margin-left:-80px">
                     <div class="barcode-image-border">
                        <img class="barcode-scanner-image" height="81" width="82"
                           src="https://meradriver.com/public/frontend/assets/common-image/app-mer-driver.png">
                        <p class="barcode-text">Scan to download</p>
                     </div>
                  </div>

                  <div class="left-side-image" style="margin-left:50px">
                     <img class="background-half-image" height="" width=""
                      src="{{asset('meradriver')}}/img/pages/app-mer-driver.png">
                  </div>

                  <span class="wdgt-track-view" data-ga-view="Get App Link|MeraDriver Home Page"
                     data-id="mainSection.inventory-8.download-app-link-json-wdgt.v5"></span>
               </div>
            </div>
         </div>
      </div>
   </section>
   @endsection
