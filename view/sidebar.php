<div class="sidebar">
    <div class="logo">
    <h1 style="font-size: px;" style="width: 100px;" style="height: 30px; " style="max-width: 10%; ">GESTION DE INVENTARIO</h1>
    </div>
    <ul>
        <li>
            <a href="index.php?vista=perfil">
                <i class="fas fa-user"></i> Perfil
            </a>
        </li>
        <li>
            <a href="index.php?vista=home">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="index.php?vista=inventario">
                <i class="fas fa-boxes"></i> Inventario
            </a>
        </li>
        <li>
            <a href="index.php?vista=mantenimiento">
                <i class="fas fa-tools"></i> Mantenimiento
            </a>
        </li>
        <li>
            <a href="index.php?vista=reportes">
                <i class="fas fa-chart-line"></i> Reportes
            </a>    
        </li>
        <li>
            <a href="index.php?vista=informacion">
                <i class="fas fa-cog"></i> Informacion
            </a>
        </li>
        <li>
            <a href="../index.php?vista=logout">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </li>
        <li>
    <style>
        .sidebar {
    width: 250px;
    background-color: #461615; /* Color de fondo */
    color: #f7f7f7; /* Color del texto */
    display: flex;
    flex-direction: column;
    padding: 20px;
    height: 94.2vh; /* Ocupa toda la altura de la ventana */
    border-right: 2px solid #4c4646; /* Línea divisoria en el lado derecho */
    animation: slideInLeft 1s ease-in-out; /* Animación opcional */
}


.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    margin: 30px 0;
    opacity: 0;
    animation: slideInItem 1s ease forwards;
    animation-delay: calc(0.2s * var(--i));
}

.Linea{
    width: 100%; /* Largo de la línea */
    height: 2px; /* Grosor de la línea */
    background-color: #000; /* Color de la línea (negro) */
    margin: -30 ; /* Espaciado arriba y abajo */
    z-index: 1000; /* Asegura que esté encima de otros elementos */
}

.sidebar ul li a {
    color: #ffffff;
    text-decoration: none;
    font-size: 20px;
    display: flex;
    align-items: center;
    transition: transform 0.3s, text-decoration 0.3s;
}

.sidebar ul li a:hover {
    transform: scale(1.1);
    color: #EC1B1A; /* Cambia el color cuando pasas el mouse */
    text-decoration: underline;
}

.sidebar ul li i {
    margin-right: 10px;
}

/* Animaciones */
@keyframes fadeInLogo {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes slideInItem {
    from {
        transform: translateX(-50px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}






    </style>

    <script>
        /* 
        const calendar = document.getElementById('calendar');
        const daysContainer = calendar.querySelector('.days');
        const monthYear = calendar.querySelector('#month-year');
        const prevButton = calendar.querySelector('#prev');
        const nextButton = calendar.querySelector('#next');

        const now = new Date();
        let currentMonth = now.getMonth();
        let currentYear = now.getFullYear();

        const monthNames = [
            "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
        ];
        const dayNames = ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"];

        function renderCalendar(month, year) {
            daysContainer.innerHTML = ""; 
            monthYear.textContent = `${monthNames[month]} ${year}`;

            
            dayNames.forEach(day => {
                const dayHeader = document.createElement('div');
                dayHeader.classList.add('day-header');
                dayHeader.textContent = day;
                daysContainer.appendChild(dayHeader);
            });

            
            const firstDay = new Date(year, month, 1).getDay();

            
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                daysContainer.appendChild(emptyDay);
            }

            
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('day');
                dayElement.textContent = day;

                
                if (
                    day === now.getDate() &&
                    month === now.getMonth() &&
                    year === now.getFullYear()
                ) {
                    dayElement.classList.add('today');
                }

                daysContainer.appendChild(dayElement);
            }
        }

        function changeMonth(direction) {
            currentMonth += direction;

            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            } else if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }

            renderCalendar(currentMonth, currentYear);
        }

        prevButton.addEventListener('click', () => changeMonth(-1));
        nextButton.addEventListener('click', () => changeMonth(1));

        
        renderCalendar(currentMonth, currentYear);*/
    </script>
            <style>
            
                
                    .calendar {
                        width: 210px;
                        background: #ffffff;
                        color: #34495e;
                        position: relative;
                        left: 1px; 
                        border-radius: 10px;
                        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                        padding: 25px; 
                        text-align: center;
                        font-family: Arial, sans-serif;
                    }

                    
                    .calendar-header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 5px; 
                    }

                    .calendar-header button {
                        background: #7A7474;
                        color: #ffffff;
                        border: none;
                        padding: 5px 10px;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background 0.3s ease;
                    }

                    .calendar-header button:hover {
                        background: #BA8148;
                    }

                    
                    .days {
                        display: grid;
                        grid-template-columns: repeat(7, 1fr); 
                        gap: 1px; 
                    }

                    .day {
                        padding: 8px; 
                        background: #7A7474;
                        border-radius: 5px;
                        color: #ffffff;
                        transition: background 0.3s ease;
                        text-align: center;
                        font-size: 14px; 
                    }

                    .day:hover {
                        background: #BA8148;
                        cursor: pointer;
                    }

                    
                    .day-header {
                        font-weight: bold;
                        color: #34495e;
                        text-transform: uppercase;
                        font-size: 13px;
                    }

                    
                    .day.today {
                        background: #461615;
                        color: #ffffff;
                        font-weight: bold;
                    }

                    .days > .day, .days > .day-header {
                        width: 90%;
                        box-sizing: border-box; 
                    }

            </style>

        </li>



    </ul>
    



</div>
