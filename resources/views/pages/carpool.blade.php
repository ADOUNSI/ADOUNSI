
<!DOCTYPE html>
<html lang="zxx">

<head>
       <x-head />
</head>

<body onload="initialize()">
    <div id="wrapper">

        <!-- page preloader begin -->
        <div id="de-preloader"></div>
        <!-- page preloader close -->

        <!-- header begin -->
        <header class="transparent scroll-light has-topbar">
            <x-header />
        </header>
            <!-- header close -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <!-- section begin -->
            <section id="subheader" class="jarallax text-light">
                <x-carpool.subheader />
                <x-carpool.hero />
            </section>
            <!-- section close -->



             <section class="text-light jarallax">
              <x-carpool.about />
                </section>

            <section aria-label="section">
               <x-carpool.feature />
            </section>

           <x-carpool.transport />

<section aria-label="section">
           <x-carpool.transfrontalier />
</section>

 <x-carpool.africa />

<x-carpool.qaf />

<section aria-label="section">
           <x-carpool.auto />
</section>













        </div>
        <!-- content close -->

        <a href="#" id="back-to-top"></a>

<div class="text-center my-4">
  <a href="/" class="text-decoration-none fw-semibold" style="color: #04ef47ff;">
    auto-stop.bj
  </a>
  <span class="mx-2 text-muted">›</span>
  <a href="#section-covoiturage" class="text-decoration-none fw-semibold" style="color: #ebebefff;">
    covoiturage
  </a>
</div>

        <footer class="text-light">
<section aria-label="section">
           <x-carpool.fot />
</section>
        </footer>
        <!-- footer close -->


    </div>


    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src="js/validation-booking.js"></script>

</body>

</html>
