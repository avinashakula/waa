<div id='existedImages'></div>            
       
        <script type='text/javascript'>
            function imageExists(image_url){
                var http = new XMLHttpRequest();
                http.open('HEAD', image_url, false);
                http.send();
                return http.status != 404;
            }
           

            let images = `<div id="homeSliders" class="carousel carousel-dark slide" data-bs-ride="carousel">`;
            images = images + `<div class="carousel-inner">`;
            let activeSlide = true;
            let activeSlideStatus = 'active';
            let areaCurrent = true;
            
               
                
            let indicators = `<div class="carousel-indicators">`;   
            let j = 0;
            for(let i=1; i<=10; i++){
                if( imageExists(`../admin/slides/${'slider'+'_'+i+'.jpg'}`) ){                    
                    images = images + `
                    <div class="carousel-item ${activeSlideStatus}" data-bs-interval="10000">
                        <img src="../admin/slides/${'slider'+'_'+i+'.jpg'}" class="d-block w-100" alt="...">      
                    </div>`;
                    if( activeSlide==true ){
                        indicators = indicators + `
                            <button type="button" data-bs-target="#homeSliders" data-bs-slide-to="${j}" class="active" aria-current="true" aria-label="Slide 1"></button>
                        `;
                        j++;
                    }else{
                        indicators = indicators + `
                            <button type="button" data-bs-target="#homeSliders" data-bs-slide-to="${j}" aria-label="Slide ${i}"></button>
                        `;
                        j++
                    }                   
                    if( activeSlide ){
                        activeSlide = false;
                        activeSlideStatus = "";
                    }                    
                }
            }
            indicators = indicators + `</div>`;
            images = images + indicators;
            images = images+`</div>`;
            images = images+`<button class="carousel-control-prev" type="button" data-bs-target="#homeSliders" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeSliders" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button></div>`;
            document.getElementById('existedImages').innerHTML = images;
               

           
        </script>    
