    <script>
        $(document).ready(function() {
            now = new Date;

            var mes_atual = "<?php echo $arraydata1[1]; ?>";
            mes_atual = Number(mes_atual);
            mes_atual -= 1;

            var dia = "<?php echo $arraydata1[2]; ?>";
            dia = Number(dia);
            



            var ano = "<?php echo $arraydata1[0]; ?>";
            ano = Number(ano);

            var hora = "<?php echo $arrayhora[0]; ?>";

            var minuto = "<?php echo $arrayhora[1]; ?>";

            var segundo = "<?php echo $arrayhora[2]; ?>";

            var meses = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];




            var mes_teste;

            for (i = 0; i < 12; i++) {
                if (mes_atual == i) {
                    mes_teste = meses[i]
                }

            }


            // Set the date we're counting down to
            var countDownDate = new Date(mes_teste + " " + dia + ", " + ano + " " + hora + ":" + minuto + ":" + segundo).getTime();
            console.log(countDownDate);
            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));

                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                if (distance > 0) {
                document.getElementById("dday").innerHTML = "Tempo restante: " + days + " dias " + hours + ":" +
                    minutes + ":" + seconds;
                }
                // If the count down is finished, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("dday_expirado").innerHTML = "Tempo expirado: 00:00:00";
                }
            }, 1000);
        });
    </script>