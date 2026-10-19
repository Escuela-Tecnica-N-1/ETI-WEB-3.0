const counters = document.querySelectorAll(".counter");
const stats = document.querySelectorAll(".stat");

let started = false;

function iniciarContador(){

    if(started) return;

    const section = document.querySelector(".stats-section");

    const posicion = section.getBoundingClientRect().top;

    if(posicion < window.innerHeight - 120){

        started = true;

        stats.forEach((stat,index)=>{

            setTimeout(()=>{

                stat.classList.add("visible");

            },index*180);

        });

        counters.forEach(counter=>{

            const target = +counter.dataset.target;

            let numero = 0;

            const incremento = target/100;

            function actualizar(){

                numero += incremento;

                if(numero < target){

                    counter.innerText = Math.ceil(numero);

                    requestAnimationFrame(actualizar);

                }else{

                    counter.innerText = target;

                }

            }

            actualizar();

        });

    }

}

window.addEventListener("scroll", iniciarContador);

window.addEventListener("load", iniciarContador);