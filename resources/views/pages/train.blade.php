
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
4
          <x-header />


        </header>

        <!-- header close -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section id="section-hero" aria-label="section" class="jarallax">
                <x-hero-search />
            </section>

<x-transport-choice />

            <section class="text-light jarallax">
               <x-about-agency />

            </section>


            <section aria-label="section">
               <x-feature-banner />
            </section>

            <section id="section-cars">
                <x-trajet-card/>

            </section>
            <section class="text-light jarallax" aria-label="section">
                        <x-adventure-banner />
            </section>











        </div>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>
        <!-- footer begin -->
        <footer class="text-light">
         <x-footer />
        <x-scripts />
        </footer>
        <!-- footer close -->
    </div>

    <!-- Javascript Files
    ================================================== -->


</body>

</html>
