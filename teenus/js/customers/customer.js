$(document).ready(function () {
  const projectContainer = $(".project-container");

   function loadProjects() {
    $.ajax({
      url: "/api/clients",
      success: function (projects) {
        // Limpiar el contenedor
        projectContainer.empty();

        // Generar dinámicamente los elementos de los proyectos
        projects.forEach((project) => {
          const projectItem = `
                        <div class="col-lg-3 col-md-6 project-grid-item all ${project.category}">
                            <div class="project-item">
                                <img src="${project.image_url}" alt="${project.alt_text}" style="width:180px">
                                <div class="project-content-overlay">
                                    <p>${project.description}</p>
                                    <h3><a href="${project.link}">${project.title}</a></h3>
                                </div>
                            </div>
                        </div>
                    `;
          projectContainer.append(projectItem);
        });
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar los proyectos:", error);
      },
    });
  }

  // Llamar a la función para cargar los proyectos
  loadProjects();
});
