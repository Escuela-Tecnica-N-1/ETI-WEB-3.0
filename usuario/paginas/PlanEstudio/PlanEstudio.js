document.addEventListener("DOMContentLoaded", () => {
  // Referencias a elementos del DOM
  const yearSelect = document.getElementById("year-select")
  const specialtySelect = document.getElementById("specialty-select")
  const specialtyContainer = document.getElementById("specialty-container")
  const planBody = document.getElementById("plan-body")

  // Datos del Plan de Estudio - Nombre, Horas Semanales, Total de Horas
  const planData = {
    // Ciclo básico (1ro a 3ro)
    1: {
      common: [
        { materia: "Ciencias Naturales", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Ciencias Sociales", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Construcción de Ciudadanía", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Matemática", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },
        
        { materia: "Prácticas del Lenguaje", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Lenguajes Tecnológicos", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Procedimientos Técnicos", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Sistemas Tecnológicos", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Educación Artística", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },
      ],
    },
    2: {
      common: [
        { materia: "Ciencias Naturales", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Ciencias Sociales", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Construcción de Ciudadanía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Matemática", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Prácticas del Lenguaje", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Lenguajes Tecnológicos", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Procedimientos Técnicos", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Sistemas Tecnológicos", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Educación Artística", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },
      ],
    },
    3: {
      common: [
        { materia: "Ciencias Naturales", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Ciencias Sociales", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Construcción de Ciudadanía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Matemática", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Prácticas del Lenguaje", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Lenguajes Tecnológicos", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Procedimientos Técnicos", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Sistemas Tecnológicos", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Educación Artística", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },
      ],
    },
    
    // Ciclo superior - Informática (4to a 7mo)
    4: {
      informatica: [
        { materia: "Literatura", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Salud y Adolescencia", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Historia", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Geografía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Matemática", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Física", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Química", horasSemanales: 2, totalHoras: 72,
          pdf: "" },
        
        { materia: "Tecnologías Eléctricas", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Laboratorio de Programación", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Laboratorio de Hardware", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Laboratorio de Sistemas Operativos", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Laboratorio de Aplicaciones", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },
      ],
      
      electromecanica: [
        { materia: "Literatura", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Salud y Adolescencia", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Historia", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Geografía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Matemática", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Física", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Química", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Conocimiento de los Materiales", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Dibujo Tecnológico", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Máquinas Eléctricas y Automatismos", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Diseño y Procesamiento Mecánico", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Instalaciones y Aplicaciones de la Energía", horasSemanales: 4, totalHoras: 144,
          pdf: "" },
      ],
    },
    
    5: {
      informatica: [
        { materia: "Literatura", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Historia", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Geografía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Análisis Matemático", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Sistemas Digitales", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Teleinformática", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Laboratorio de Programación", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Laboratorio de Hardware", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Laboratorio de Sistemas Operativos", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Laboratorio de Aplicaciones", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },
      ],
      
      electromecanica: [
        { materia: "Literatura", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Política y Ciudadanía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Historia", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Geografía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Análisis Matemático", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Mecánica y Mecanismos", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Electrotecnia", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Resistencia y Ensayos de los Materiales", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Máquinas Eléctricas y Automatismos", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Diseño y Procesamiento Mecánico", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Instalaciones y Aplicaciones de la Energía", horasSemanales: 4, totalHoras: 144,
          pdf: "" },
      ],
    },
    
    6: {
      informatica: [
        { materia: "Literatura", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Filosofía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Arte", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Matemática Aplicada", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Sistemas Digitales", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Investigación Operativa", horasSemanales: 3, totalHoras: 108,
          pdf: "" },
        
        { materia: "Seguridad Informática", horasSemanales: 3, totalHoras: 108, 
          pdf: "" },

        { materia: "Derecho del Trabajo", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Laboratorio de Programación", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Laboratorio de Hardware", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Laboratorio de Sistemas Operativos", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Laboratorio de Aplicaciones", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },
      ],
      
      electromecanica: [
        { materia: "Literatura", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Inglés", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Educación Física", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Filosofía", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Arte", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Matemática Aplicada", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Termodinámica y Máquinas Térmicas", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Electrotecnia", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Sistemas Mecánicos", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Derecho del Trabajo", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Laboratorio de Mediciones Eléctricas", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Máquinas Eléctricas y Automatismos", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Diseño y Procesamiento Mecánico", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Instalaciones y Aplicaciones de la Energía", horasSemanales: 4, totalHoras: 144,
          pdf: "" },
      ],
    },
    
    7: {
      informatica: [
        { materia: "Prácticas Profesionalizantes del Sector Informático", horasSemanales: 12, totalHoras: 200,
          pdf: "" },

        { materia: "Emprendimientos Productivos y Desarrollo Local", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Evaluación de Proyectos", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Modelos y Sistemas", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Bases de Datos", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Proyecto, Diseño e Implementación de Sistemas Computacionales", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Instalación, Mantenimiento y Reparación de Sistemas Computacionales", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Instalación, Mantenimiento y Reparación de Redes Informáticas", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },
      ],
      
      electromecanica: [
        { materia: "Prácticas Profesionalizantes del Sector Electromecánico", horasSemanales: 12, totalHoras: 200,
          pdf: "" },

        { materia: "Emprendimientos Productivos y Desarrollo Local", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Electrónica Industrial", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Seguridad, Higiene y Protección Ambiental", horasSemanales: 2, totalHoras: 72,
          pdf: "" },

        { materia: "Máquinas Eléctricas", horasSemanales: 3, totalHoras: 108,
          pdf: "" },

        { materia: "Sistemas Mecánicos", horasSemanales: 4, totalHoras: 144,
          pdf: "" },

        { materia: "Laboratorio de Metodología y Control de Calidad", horasSemanales: 2, totalHoras: 72, 
          pdf: "" },

        { materia: "Mantenimiento y Montaje Electromecánico", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Proyecto y Diseño Electromecánico", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },

        { materia: "Proyecto y Diseño de Instalaciones Eléctricas", horasSemanales: 4, totalHoras: 144, 
          pdf: "" },
      ],
    },
  };

  // Función para actualizar la tabla
  function updatePlan() {
    const year = yearSelect.value
    const specialty = specialtySelect.value

    // Obtener los datos del plan
    let data = planData[year]
    if (!data) return

    // Para ciclo básico (1-3) no hay especialidades
    if (year <= 3) {
      data = data.common
      specialtyContainer.style.display = "none"
    } else {
      specialtyContainer.style.display = "flex"
      data = data[specialty] || []
    }

    // Limpiar tabla
    planBody.innerHTML = ""

    // Llenar tabla
    data.forEach((item) => {
      const row = document.createElement("tr")

      let materiaCell
      if (item.pdf) { //si tiene pdf lo genera como link
        materiaCell = `<a href="${item.pdf}" target="_blank" class="materia-link">${item.materia}</a>`
      } else { //sino tiene lo genera como texto normal
        materiaCell = item.materia
      }

      row.innerHTML = `
        <td>${materiaCell}</td>
        <td>${item.horasSemanales}</td>
        <td>${item.totalHoras}</td>
      `
      planBody.appendChild(row)
    })
  }

  // Event listeners
  yearSelect.addEventListener("change", updatePlan)
  specialtySelect.addEventListener("change", updatePlan)

  // Cargar datos iniciales
  updatePlan()
})
