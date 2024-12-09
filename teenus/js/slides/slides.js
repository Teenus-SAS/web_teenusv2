$(document).ready(function () {
  const slidesContainer = $(".slidesContainer");

  function loadProjects() {
    $.ajax({
      url: "/api/pain-points",
      success: function (slides) {
        // Limpiar el contenedor
        slidesContainer.empty();
        i = 1;
        // Generar dinámicamente los elementos de los proyectos
        slides.forEach((slide) => {
          if (i == 9) i = 1;
          const projectSlide = `
            <div class="swiper-slide">
                <div class="bg-img valign" data-background="/teenus/assets/img/sliders/slider-${i}.jpg" data-overlay-dark="3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="caption">
                                    <h1>${slide.pain_points}</h1>
                                   
                                    <div class="banner-btn home-slider-btn">
                                        <a href="/tezliksoftware" class="default-btn-one">Conoce más<span></span></a>
                                        <a class="default-btn" href="#contact">Contáctanos Ya<span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                      `;
          slidesContainer.append(projectSlide);
          i = i + 1;
        });
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar los slides:", error);
      },
    });
  }

  // Llamar a la función para cargar los proyectos
  loadProjects();
});
