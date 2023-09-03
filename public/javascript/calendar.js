        // Datos de ejemplo (puedes cargarlos desde una API o base de datos)
        const actividades = {
            "Lunes": ["Actividad 1", "Actividad 2"],
            "Martes": ["Actividad 3", "Actividad 4"],
            "Miércoles": ["Actividad 5"],
            "Jueves": ["Actividad 6", "Actividad 7"],
            "Viernes": ["Actividad 8"],
            "Sábado": ["Actividad 1", "Actividad 2","Actividad 3", "Actividad 4","Actividad 5", "Actividad 6"],
            "Domingo": []
        };

        // Días de la semana en español
        const diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];

        // Función para cargar las actividades de un día seleccionado
        function cargarActividades(dia) {
            const actividadesContainer = document.getElementById("actividades");
            actividadesContainer.innerHTML = ""; // Limpiar contenido anterior
            // creamos la tabla
            const table = document.createElement("table");
            table.classList.add("calendario");
            // encabezado de la tabla
            const thead = document.createElement("thead");
            // cuerpo de la tabla
            const tbody = document.createElement("tbody");

            // Encabezado de la tabla
            const th = document.createElement("th");
            // insertamos texto al encabezado
            th.textContent = "Actividades programadas";
            // creamos una fila en el ENCABEZADO
            const tr = document.createElement("tr");
            // th sera hija de tr y tr sera hija de thead
            tr.appendChild(th);
            thead.appendChild(tr);

            // Actividades del día seleccionado
            const listaActividades = actividades[dia];
            listaActividades.forEach(actividad => {
                // creamos los elementos
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                td.classList.add("celdas");
                // insertamos texto
                td.textContent = actividad;
                // td sera hija de tr y tr es hija de tbody
                tr.appendChild(td);
                tbody.appendChild(tr);
            });

            table.appendChild(thead);
            table.appendChild(tbody);
            actividadesContainer.appendChild(table);
        }
        // Generar los botones de días de la semana
        // diasSemana
        const diasSemanaContainer = document.getElementById("diasSemana");
        diasSemana.forEach(dia => {
            const dayButton = document.createElement("button");
            dayButton.classList.add("day-button");
            dayButton.textContent = dia;
            dayButton.addEventListener("click", () => cargarActividades(dia));
            diasSemanaContainer.appendChild(dayButton);
        });

        // Cargar las actividades del día actual al cargar la página
        cargarActividades(diasSemana[1]); // Por ejemplo, carga actividades del "Lunes" al inicio