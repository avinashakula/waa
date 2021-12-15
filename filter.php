<div class="container">
    <div class="bg-white rounded d-flex align-items-center justify-content-between" id="header"> <button class="btn btn-hide text-uppercase" type="button" data-toggle="collapse" data-target="#filterbar" aria-expanded="false" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()"> <span class="fas fa-angle-left" id="filter-angle"></span> <span id="btn-txt">Hide filters</span> </button>
        <nav class="navbar navbar-expand-lg navbar-light pl-lg-0 pl-auto"> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation" onclick="chnageIcon()" id="icon"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav d-lg-flex align-items-lg-center">
                    <li class="nav-item active"> <select name="sort" id="sort">
                            <option value="" hidden selected>Sort by</option>
                            <option value="price">Price</option>
                            <option value="popularity">Popularity</option>
                            <option value="rating">Rating</option>
                        </select> </li>
                    <li class="nav-item d-inline-flex align-items-center justify-content-between mb-lg-0 mb-3">
                        <div class="d-inline-flex align-items-center mx-lg-2" id="select2">
                            <div class="pl-2">Products:</div> <select name="pro" id="pro">
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="font-weight-bold mx-2 result">18 from 200</div>
                    </li>
                    <li class="nav-item d-lg-none d-inline-flex"> </li>
                </ul>
            </div>
        </nav>
        <div class="ml-auto mt-3 mr-2">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true" class="font-weight-bold">&lt;</span> <span class="sr-only">Previous</span> </a> </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">..</a></li>
                    <li class="page-item"><a class="page-link" href="#">24</a></li>
                    <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true" class="font-weight-bold">&gt;</span> <span class="sr-only">Next</span> </a> </li>
                </ul>
            </nav>
        </div>
    </div>
    <div id="content" class="my-5">
        <div id="filterbar" class="collapse">
            <div class="box border-bottom">
                <div class="form-group text-center">
                    <div class="btn-group" data-toggle="buttons"> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="radio"> Reset </label> <label class="btn btn-success form-check-label active"> <input class="form-check-input" type="radio" checked> Apply </label> </div>
                </div>
                <div> <label class="tick">New <input type="checkbox" checked="checked"> <span class="check"></span> </label> </div>
                <div> <label class="tick">Sale <input type="checkbox"> <span class="check"></span> </label> </div>
            </div>
            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">Outerwear <button class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box" aria-expanded="false" aria-controls="inner-box" id="out" onclick="outerFilter()"> <span class="fas fa-plus"></span> </button> </div>
                <div id="inner-box" class="collapse mt-2 mr-1">
                    <div class="my-1"> <label class="tick">Windbreaker <input type="checkbox" checked="checked"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Jumpsuit <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Jacket <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Coat <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Raincoat <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Handbag <input type="checkbox" checked> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Warm vest <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Wallets <input type="checkbox" checked> <span class="check"></span> </label> </div>
                </div>
            </div>
            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">season <button class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box2" aria-expanded="false" aria-controls="inner-box2"><span class="fas fa-plus"></span></button> </div>
                <div id="inner-box2" class="collapse mt-2 mr-1">
                    <div class="my-1"> <label class="tick">Spring <input type="checkbox" checked="checked"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Summer <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Autumn <input type="checkbox" checked> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Winter <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Rainy <input type="checkbox"> <span class="check"></span> </label> </div>
                </div>
            </div>
            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">price <button class="btn ml-auto" type="button" data-toggle="collapse" data-target="#price" aria-expanded="false" aria-controls="price"><span class="fas fa-plus"></span></button> </div>
                <div class="collapse" id="price">
                    <div class="middle">
                        <div class="multi-range-slider"> <input type="range" id="input-left" min="0" max="100" value="10"> <input type="range" id="input-right" min="0" max="100" value="50">
                            <div class="slider">
                                <div class="track"></div>
                                <div class="range"></div>
                                <div class="thumb left"></div>
                                <div class="thumb right"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <div> <span id="amount-left" class="font-weight-bold"></span> uah </div>
                        <div> <span id="amount-right" class="font-weight-bold"></span> uah </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-label text-uppercase d-flex align-items-center">size <button class="btn ml-auto" type="button" data-toggle="collapse" data-target="#size" aria-expanded="false" aria-controls="size"><span class="fas fa-plus"></span></button> </div>
                <div id="size" class="collapse">
                    <div class="btn-group d-flex align-items-center flex-wrap" data-toggle="buttons"> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox"> 80 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 92 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 102 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 104 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 106 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 108 </label> </div>
                </div>
            </div>
        </div>
        <div id="products">
            <div class="row mx-0">
                <div class="col-lg-4 col-md-6">
                    <div class="card d-flex flex-column align-items-center">
                        <div class="product-name">Torn Jeans for Men</div>
                        <div class="card-img"> <img src="https://www.freepnglogos.com/uploads/jeans-png/jeans-mens-pants-cliparts-download-clip-art-37.png" alt=""> </div>
                        <div class="card-body pt-5">
                            <div class="text-muted text-center mt-auto">Available Colors</div>
                            <div class="d-flex align-items-center justify-content-center colors my-2">
                                <div class="btn-group" data-toggle="buttons" data-tooltip="tooltip" data-placement="right" title="choose color"> <label class="btn btn-red form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-blue form-check-label active"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-green form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-orange form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-pink form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> </div>
                            </div>
                            <div class="d-flex align-items-center price">
                                <div class="del mr-2"><span class="text-dark">5500 uah</span></div>
                                <div class="font-weight-bold">4500 uah</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-md-0 pt-3">
                    <div class="card d-flex flex-column align-items-center">
                        <div class="product-name">Nike Tshirts for Men</div>
                        <div class="card-img"> <img src="https://www.freepnglogos.com/uploads/t-shirt-png/t-shirt-png-printed-shirts-south-africa-20.png" alt="" height="100" id="shirt"> </div>
                        <div class="text-muted text-center mt-auto">Available Sizes</div>
                        <div id="avail-size">
                            <div class="btn-group d-flex align-items-center flex-wrap" data-toggle="buttons"> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox"> 80 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 92 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 102 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 104 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 106 </label> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="checkbox" checked> 108 </label> </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-muted text-center mt-auto">Available Colors</div>
                            <div class="d-flex align-items-center justify-content-center colors my-2">
                                <div class="btn-group" data-toggle="buttons" data-tooltip="tooltip" data-placement="right" title="choose color"> <label class="btn btn-light border form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-blue form-check-label active"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-green form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-orange form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-pink form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> </div>
                            </div>
                            <div class="d-flex align-items-center price">
                                <div class="del mr-2"><span class="text-dark">5500 uah</span></div>
                                <div class="font-weight-bold">4500 uah</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-lg-0 pt-md-4 pt-3">
                    <div class="card d-flex flex-column align-items-center">
                        <div class="product-name text-center">Casual Dress Belts For Men</div>
                        <div class="card-img"> <img src="https://www.freepnglogos.com/uploads/belts-png/casual-dress-belts-for-men-28.png" alt=""> </div>
                        <div class="card-body pt-5">
                            <div class="text-muted text-center mt-auto">Available Colors</div>
                            <div class="d-flex align-items-center justify-content-center colors my-2">
                                <div class="btn-group" data-toggle="buttons" data-tooltip="tooltip" data-placement="right" title="choose color"> <label class="btn btn-dark border form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-brown form-check-label active"> <input class="form-check-input" type="radio" autocomplete="off"> </label> </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center price">
                                <div class="font-weight-bold">500 uah</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-md-4 pt-3">
                    <div class="card d-flex flex-column align-items-center">
                        <div class="product-name text-center">Footwear For Women</div>
                        <div class="card-img"> <img src="https://www.freepnglogos.com/uploads/women-shoes-png/download-women-shoes-png-image-png-image-pngimg-2.png" alt=""> </div>
                        <div class="card-body pt-5">
                            <div class="text-muted text-center mt-auto">Available Colors</div>
                            <div class="d-flex align-items-center justify-content-center colors my-2">
                                <div class="btn-group" data-toggle="buttons" data-tooltip="tooltip" data-placement="right" title="choose color"> <label class="btn btn-dark border form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-brown form-check-label active"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-pink form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-red form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center price">
                                <div class="font-weight-bold">1500 uah</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-md-4 pt-3">
                    <div class="card d-flex flex-column align-items-center">
                        <div class="product-name text-center">Nike Jogging shoes For Men</div>
                        <div class="card-img"> <img src="https://www.freepnglogos.com/uploads/shoes-png/find-your-perfect-running-shoes-26.png" alt=""> </div>
                        <div class="card-body pt-5">
                            <div class="text-muted text-center mt-auto">Available Colors</div>
                            <div class="d-flex align-items-center justify-content-center colors my-2">
                                <div class="btn-group" data-toggle="buttons" data-tooltip="tooltip" data-placement="right" title="choose color"> <label class="btn btn-dark border form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-pink form-check-label active"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-blue form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-orange form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center price">
                                <div class="font-weight-bold">1200 uah</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-md-4 pt-3">
                    <div class="card d-flex flex-column align-items-center">
                        <div class="product-name text-center">Leather Wallets For Men</div>
                        <div class="card-img"> <img src="https://www.freepnglogos.com/uploads/money-png/money-wallet-dollar-image-money-pictures-download-27.png" alt=""> </div>
                        <div class="card-body pt-5">
                            <div class="text-muted text-center mt-auto">Available Colors</div>
                            <div class="d-flex align-items-center justify-content-center colors my-2">
                                <div class="btn-group" data-toggle="buttons" data-tooltip="tooltip" data-placement="right" title="choose color"> <label class="btn btn-dark border form-check-label"> <input class="form-check-input" type="radio" autocomplete="off"> </label> <label class="btn btn-brown form-check-label active"> <input class="form-check-input" type="radio" autocomplete="off"> </label> </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center price">
                                <div class="font-weight-bold">900 uah</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    background-color: #f4f4f4
}

.container {
    margin: 40px auto
}

#header {
    width: 100%;
    height: 60px;
    box-shadow: 5px 5px 15px #e8e8e8
}

.col-lg-4,
.col-md-6 {
    padding-right: 0
}

button.btn.btn-hide {
    height: inherit;
    background-color: #ff935d;
    color: #fff;
    font-size: 0.82rem;
    padding-left: 40px;
    padding-right: 40px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px
}

.btn:focus {
    box-shadow: none
}

.box-label .btn {
    background-color: #fff;
    padding: 0;
    font-size: 0.8rem
}

.btn-red {
    background-color: #e00000ce
}

.btn-orange {
    background-color: #ffa500
}

.btn-pink {
    background-color: #e0009dce
}

.btn-green {
    background-color: #00811c
}

.btn-blue {
    background-color: #026bc2
}

.btn-brown {
    background-color: #994a00
}

.navbar {
    display: inline-flex
}

.pagination .page-item .page-link {
    color: #333;
    border: none;
    width: 40px;
    text-align: center
}

.pagination .page-item.active .page-link {
    background-color: #fff;
    border: 1px solid #333
}

select {
    outline: none;
    padding: 6px 12px;
    margin: 0px 4px;
    color: #999;
    font-size: 0.85rem;
    width: 140px
}

#select2 {
    border: 1px solid #777;
    color: #999
}

#pro {
    border: none;
    color: #333;
    font-weight: 700;
    padding-left: 0px;
    width: initial
}

#filterbar {
    width: 30%;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 15px;
    float: left
}

#filterbar input[type="radio"] {
    visibility: hidden
}

#filterbar input[type='radio']:checked {
    background-color: #16c79a;
    border: none
}

#filterbar .btn.btn-success {
    background-color: #ddd;
    color: #333;
    border: none;
    width: 115px
}

#filterbar .btn.btn-success:hover {
    background-color: #aff1e1;
    color: #444
}

#filterbar .btn-success:not(:disabled):not(.disabled).active,
#filterbar .btn-success:not(:disabled):not(.disabled):active {
    background-color: #16c79a;
    color: #fff
}

label {
    cursor: pointer
}

.tick {
    display: block;
    position: relative;
    padding-left: 23px;
    cursor: pointer;
    font-size: 0.9rem;
    margin: 0
}

.tick input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0
}

.check {
    position: absolute;
    top: 1px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 3px
}

.tick:hover input~.check {
    background-color: #f3f3f3
}

.tick input:checked~.check {
    background-color: #ffffff
}

.check:after {
    content: "";
    position: absolute;
    display: none
}

.tick input:checked~.check:after {
    display: block;
    transform: rotate(45deg) scale(1)
}

.tick .check:after {
    left: 6px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid rgb(0, 0, 0);
    border-width: 0 3px 3px 0;
    transform: rotate(45deg) scale(2)
}

.box {
    padding: 10px
}

.box-label {
    color: #11698e;
    font-size: 0.9rem;
    font-weight: 800
}

#inner-box,
#inner-box2 {
    height: 150px;
    overflow-y: scroll
}

#inner-box2 {
    height: 132px
}

#inner-box::-webkit-scrollbar,
#inner-box2::-webkit-scrollbar {
    width: 6px
}

#inner-box::-webkit-scrollbar-track,
#inner-box2::-webkit-scrollbar-track {
    background-color: #ddd;
    border-radius: 2px
}

#inner-box::-webkit-scrollbar-thumb,
#inner-box2::-webkit-scrollbar-thumb {
    background-color: #333;
    border-radius: 2px
}

#price {
    height: 45px
}

#size input[type="checkbox"] {
    visibility: hidden
}

#size input[type='checkbox']:checked {
    background-color: #16c79a;
    border: none
}

#size .btn.btn-success {
    background-color: #ddd;
    color: #333;
    border: none;
    width: 40px;
    font-size: 0.8rem;
    border-radius: 0
}

#size .btn.btn-success:hover {
    background-color: #aff1e1;
    color: #444
}

#size .btn-success:not(:disabled):not(.disabled).active,
#size .btn-success:not(:disabled):not(.disabled):active {
    background-color: #16c79a;
    color: #fff
}

#size label {
    margin: 10px;
    margin-left: 0px
}

.card {
    padding: 10px;
    cursor: pointer;
    transition: .3s all ease-in-out;
    height: 350px
}

.card:hover {
    box-shadow: 2px 2px 15px #fd9a6ce5;
    transform: scale(1.02)
}

.card .product-name {
    font-weight: 600
}

.card-body {
    padding-bottom: 0
}

.card .text-muted {
    font-size: 0.82rem
}

.card-img img {
    padding-top: 10px;
    width: inherit;
    height: 180px;
    object-fit: contain;
    display: block
}

.card-body .btn-group .btn {
    padding: 0;
    width: 20px;
    height: 20px;
    margin-right: 5px;
    border-radius: 50%;
    position: relative
}

.card-body .btn-group>.btn-group:not(:last-child)>.btn,
.card-body .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-radius: 50%;
    transition: ease-in all .4s
}

.card-body input[type="radio"] {
    visibility: hidden
}

.card-body .btn:not(:disabled):not(.disabled).active::after,
.card-body .btn:not(:disabled):not(.disabled):active::after {
    content: "";
    width: 10px;
    height: 10px;
    border-radius: 50%;
    top: 4px;
    left: 4.2px;
    background-color: #fff;
    position: absolute;
    transition: ease-in all .4s
}

.card-body .btn.btn-light:not(:disabled):not(.disabled).active::after,
.card-body .btn.btn-light:not(:disabled):not(.disabled):active::after {
    background-color: #000
}

#avail-size input[type="checkbox"] {
    visibility: hidden
}

#avail-size input[type='checkbox']:checked {
    background-color: #16c79a;
    border: none
}

#avail-size .btn.btn-success {
    background-color: #ddd;
    color: #333;
    border: none;
    width: 20px;
    font-size: 0.7rem;
    border-radius: 0;
    padding: 0
}

#avail-size .btn.btn-success:hover {
    background-color: #aff1e1;
    color: #444
}

#avail-size .btn-success:not(:disabled):not(.disabled).active,
#avail-size .btn-success:not(:disabled):not(.disabled):active {
    background-color: #16c79a;
    color: #fff
}

#avail-size label {
    margin: 10px;
    margin-left: 0px
}

#shirt {
    height: 170px
}

.middle {
    position: relative;
    width: 100%;
    margin-top: 25px
}

.slider {
    position: relative;
    z-index: 1;
    height: 5px;
    margin: 0 15px
}

.slider>.track {
    position: absolute;
    z-index: 1;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    border-radius: 5px;
    background-color: #ddd
}

.slider>.range {
    position: absolute;
    z-index: 2;
    left: 25%;
    right: 25%;
    top: 0;
    bottom: 0;
    border-radius: 5px;
    background-color: #36a31b
}

.slider>.thumb {
    position: absolute;
    top: 2px;
    z-index: 3;
    width: 20px;
    height: 20px;
    background-color: #36a31b;
    border-radius: 50%;
    box-shadow: 0 0 0 0 rgba(63, 204, 75, 0.705);
    transition: box-shadow .3s ease-in-out
}

.slider>.thumb::after {
    position: absolute;
    width: 8px;
    height: 8px;
    left: 28%;
    top: 30%;
    border-radius: 50%;
    content: '';
    background-color: #fff
}

.slider>.thumb.left {
    left: 25%;
    transform: translate(-15px, -10px)
}

.slider>.thumb.right {
    right: 25%;
    transform: translate(15px, -10px)
}

.slider>.thumb.hover {
    box-shadow: 0 0 0 10px rgba(125, 230, 134, 0.507)
}

.slider>.thumb.active {
    box-shadow: 0 0 0 10px rgba(63, 204, 75, 0.623)
}

input[type=range] {
    position: absolute;
    pointer-events: none;
    -webkit-appearance: none;
    z-index: 2;
    height: 10px;
    width: 100%;
    opacity: 0
}

input[type=range]::-webkit-slider-thumb {
    pointer-events: all;
    width: 30px;
    height: 30px;
    border-radius: 0;
    border: 0 none;
    background-color: red;
    -webkit-appearance: none
}

.del {
    text-decoration: line-through;
    color: red
}

@media(min-width:1199.6px) {
    #filterbar {
        width: 25%
    }
}

@media(max-width:1199.5px) {
    #filterbar {
        width: 28%
    }

    .card {
        height: 350px
    }

    .price {
        font-size: 0.9rem
    }

    .product-name {
        font-size: 0.8rem
    }
}

@media(max-width: 991.5px) {
    .navbar-nav {
        min-width: 290px;
        position: absolute;
        left: -168px;
        bottom: -146px;
        padding: 20px 10px;
        display: block;
        background-image: none;
        z-index: 2;
        background-color: #1d1c1cb2
    }

    #filterbar {
        width: 36%
    }

    #sort {
        background-color: inherit;
        color: #fff;
        margin: 0;
        margin-bottom: 20px;
        width: 100%
    }

    #sort option,
    #pro option {
        color: #000
    }

    #pro,
    #select2,
    .result {
        background-color: inherit;
        color: #fff
    }

    .card {
        height: 345px
    }

    .price {
        font-size: 0.85rem
    }
}

@media(max-width: 767.5px) {
    #filterbar {
        width: 50%
    }
}

@media(max-width: 525.5px) {
    #filterbar {
        float: none;
        width: 100%;
        margin-bottom: 20px;
        border-radius: 5px
    }

    #content.my-5 {
        margin-top: 20px !important;
        margin-bottom: 20px !important
    }

    .col-lg-4,
    .col-md-6 {
        padding-left: 0
    }
}

@media(max-width: 500.5px) {
    .pagination {
        display: none
    }
}
</style>

<script>
    // For Filters
document.addEventListener("DOMContentLoaded", function() {
var filterBtn = document.getElementById('filter-btn');
var btnTxt = document.getElementById('btn-txt');
var filterAngle = document.getElementById('filter-angle');

$('#filterbar').collapse(false);
var count = 0, count2 = 0;
function changeBtnTxt() {
$('#filterbar').collapse(true);
count++;
if (count % 2 != 0) {
filterAngle.classList.add("fa-angle-right");
btnTxt.innerText = "show filters"
filterBtn.style.backgroundColor = "#36a31b";
}
else {
filterAngle.classList.remove("fa-angle-right")
btnTxt.innerText = "hide filters"
filterBtn.style.backgroundColor = "#ff935d";
}

}

// For Applying Filters
$('#inner-box').collapse(false);
$('#inner-box2').collapse(false);

// For changing NavBar-Toggler-Icon
var icon = document.getElementById('icon');

function chnageIcon() {
count2++;
if (count2 % 2 != 0) {
icon.innerText = "";
icon.innerHTML = '<span class="far fa-times-circle" style="width:100%"></span>';
icon.style.paddingTop = "5px";
icon.style.paddingBottom = "5px";
icon.style.fontSize = "1.8rem";


}
else {
icon.innerText = "";
icon.innerHTML = '<span class="navbar-toggler-icon"></span>';
icon.style.paddingTop = "5px";
icon.style.paddingBottom = "5px";
icon.style.fontSize = "1.2rem";
}
}

// Showing tooltip for AVAILABLE COLORS
$(function () {
$('[data-tooltip="tooltip"]').tooltip()
})

// For Range Sliders
var inputLeft = document.getElementById("input-left");
var inputRight = document.getElementById("input-right");

var thumbLeft = document.querySelector(".slider > .thumb.left");
var thumbRight = document.querySelector(".slider > .thumb.right");
var range = document.querySelector(".slider > .range");

var amountLeft = document.getElementById('amount-left')
var amountRight = document.getElementById('amount-right')

function setLeftValue() {
var _this = inputLeft,
min = parseInt(_this.min),
max = parseInt(_this.max);

_this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

var percent = ((_this.value - min) / (max - min)) * 100;

thumbLeft.style.left = percent + "%";
range.style.left = percent + "%";
amountLeft.innerText = parseInt(percent * 100);
}
setLeftValue();

function setRightValue() {
var _this = inputRight,
min = parseInt(_this.min),
max = parseInt(_this.max);

_this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

var percent = ((_this.value - min) / (max - min)) * 100;

amountRight.innerText = parseInt(percent * 100);
thumbRight.style.right = (100 - percent) + "%";
range.style.right = (100 - percent) + "%";
}
setRightValue();

inputLeft.addEventListener("input", setLeftValue);
inputRight.addEventListener("input", setRightValue);

inputLeft.addEventListener("mouseover", function () {
thumbLeft.classList.add("hover");
});
inputLeft.addEventListener("mouseout", function () {
thumbLeft.classList.remove("hover");
});
inputLeft.addEventListener("mousedown", function () {
thumbLeft.classList.add("active");
});
inputLeft.addEventListener("mouseup", function () {
thumbLeft.classList.remove("active");
});

inputRight.addEventListener("mouseover", function () {
thumbRight.classList.add("hover");
});
inputRight.addEventListener("mouseout", function () {
thumbRight.classList.remove("hover");
});
inputRight.addEventListener("mousedown", function () {
thumbRight.classList.add("active");
});
inputRight.addEventListener("mouseup", function () {
thumbRight.classList.remove("active");
});
});
</script>