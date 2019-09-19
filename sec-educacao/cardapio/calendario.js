//criação do calendario por meio de uma instancia
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'pt-br',
                    plugins: ['interaction', 'dayGrid'],
                    eventLimit: true,
//Método que pega os dados do banco e os exibe no calendário
                    eventSources: [{
//a pagina que pega os dados e o retorna em JSON
                        url: 'listar_refeicoes.php',
                        color: '#2C3E50',
                        textColor: 'white',
//função que evita problemas de cache
                        extraParams: function() {
                            return {
                                cachebuster: new Date().valueOf()
                            };
                        }
                    }]
                });

                calendar.render();
            });
